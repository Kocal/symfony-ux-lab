<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\Map\Bridge\Google\GoogleOptions;
use Symfony\UX\Map\Elements;
use Symfony\UX\Map\Icon\Icon;
use Symfony\UX\Map\InfoWindow;
use Symfony\UX\Map\Live\ComponentWithMapTrait;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Markers;
use Symfony\UX\Map\Point;
use Symfony\UX\Map\Polygon;
use Symfony\UX\Map\Polygons;
use Symfony\UX\Map\Polyline;
use Symfony\UX\Map\Polylines;

#[AsLiveComponent]
final class MapLivePlayground
{
    use DefaultActionTrait;
    use ComponentWithMapTrait;

    protected function instantiateMap(): Map
    {
        $map = (new Map())
            ->options(new GoogleOptions(
                mapId: '2b2d73ba4b8c7b41',
                backgroundColor: '#fddfdd',
            ))
            ->center(new Point(46.603354, 1.888334))
            ->zoom(6)
            ->minZoom(5)
            ->maxZoom(7)
//            ->fitBoundsToMarkers()
            //->addMarker(new Marker(
            //    position: new Point(48.8566, 2.3522),
            //    title: 'Paris',
            //    infoWindow: new InfoWindow('Paris'),
            //))
            //->addMarker(new Marker(
            //    position: new Point(45.75, 4.85),
            //    title: 'Lyon',
            //    infoWindow: new InfoWindow('Lyon'),
            //))
            //->addMarker(new Marker(
            //    position: new Point(43.6047, 1.4442),
            //    title: 'Toulouse',
            //    infoWindow: new InfoWindow('Toulouse'),
            //))
            //->addPolygon(new Polygon(
            //    points: [
            //        new Point(48.8566, 2.3522),
            //        new Point(45.75, 4.85),
            //        new Point(43.6047, 1.4442),
            //    ],
            //))
            //->addPolygon(new Polygon(
            //    points: [
            //        new Point(1.4442, 43.6047),
            //        new Point(4.85, 45.75),
            //        new Point(2.3522, 48.8566),
            //    ],
            //    infoWindow: new InfoWindow('Polygon', extra: ['foo' => 'bar']),
            //    extra: ['fillColor' => '#ff0000'],
            //)) // */
            ////*
            //->addPolyline(new Polyline(
            //// Rennes to Paris to Vienna
            //    points: [
            //        new Point(48.1173, -1.6778),
            //        new Point(48.8566, 2.3522),
            //        new Point(48.2082, 16.3738),
            //    ],
            //    infoWindow: new InfoWindow('Polyline', extra: ['foo' => 'bar']),
            //    extra: ['strokeColor' => '#ff0000'],
            //)) // */
        ;

        $cities = require __dir__ . '/../../../config/cities.php';
        for ($i = 0; $i < 1; $i++) {
            $city = $cities[array_rand($cities)];
            $map->addMarker(new Marker(
                position: new Point($city['latitude'], $city['longitude']),
                title: $city['label'],
                infoWindow: new InfoWindow($city['label'], opened: true),
                icon: Icon::url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/icons/geo-alt.svg'),
            ));
        }

        return $map;
    }

    #[LiveAction]
    public function randomCenter(): void
    {
        $this->getMap()->center(new Point(random_int(3000, 5000) / 100, random_int(200, 500) / 100));
    }

    #[LiveAction]
    public function centerOnLyon(): void
    {
        $this->getMap()->center(new Point(45.75, 4.85));
    }

    #[LiveAction]
    public function centerOnParis(): void
    {
        $this->getMap()->center(new Point(48.8566, 2.3522));
    }

    #[LiveAction]
    public function randomZoom(): void
    {
        $this->getMap()->zoom(random_int(7, 12));
    }

    #[LiveAction]
    public function addRandomMarker(): void
    {
        $cities = require __dir__ . '/../../../config/cities.php';
        $city = $cities[array_rand($cities)];

        $this->getMap()->fitBoundsToMarkers(false);
        $this->getMap()->addMarker(new Marker(
            position: new Point($city['latitude'], $city['longitude']),
            title: $city['label'],
            infoWindow: new InfoWindow($city['label']),
            icon: Icon::ux('fa:map-marker'),
        ));
    }

    #[LiveAction]
    public function removeFirstMarker(): void
    {
        /** @var Markers $markers */
        $markers = \Closure::bind(fn() => $this->markers, $this->getMap(), Map::class)();
        /** @var \SplObjectStorage $elements */
        $elements = \Closure::bind(fn() => $this->elements, $markers, Elements::class)();

        foreach ($elements as $element) {
            $this->getMap()->removeMarker($element);
            break;
        }
    }

    #[LiveAction]
    public function clearAndAddRandomMarkers(): void
    {
        $map = $this->getMap();
        $reflPropertyMarkers = new \ReflectionProperty($map, 'markers');
        $reflPropertyMarkers->setValue($map, Markers::fromArray([]));

        $map
            ->addMarker(new Marker(position: new Point(48.8566, 2.3522), title: 'Paris', infoWindow: new InfoWindow('Paris'), icon: Icon::url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/icons/geo-alt.svg')))
            ->addMarker(new Marker(position: new Point(45.75, 4.85), title: 'Lyon', infoWindow: new InfoWindow('Lyon'), icon: Icon::ux('fa:map-marker')))
            ->addMarker(new Marker(position: new Point(43.6047, 1.4442), title: 'Toulouse', infoWindow: new InfoWindow('Toulouse'), icon: Icon::ux('fa:map-marker') ))
        ;

        for ($i = 0; $i < 5; $i++) {
            $this->addRandomMarker();
        }
    }

    #[LiveAction]
    public function addRandomPolygon(): void
    {
        $cities = require __dir__ . '/../../../config/cities.php';
        $edgesCount = random_int(3, 6);

        $points = [];
        for ($i = 0; $i < $edgesCount; ++$i) {
            $city = $cities[array_rand($cities)];
            $points[] = new Point($city['latitude'], $city['longitude']);
        }

        $this->getMap()->addPolygon(new Polygon(
            points: $points,
            infoWindow: new InfoWindow('Polygon', opened: true),
        ));
    }

    #[LiveAction]
    public function removeFirstPolygon(): void
    {
        /** @var Polygons $polygons */
        $polygons = \Closure::bind(fn() => $this->polygons, $this->getMap(), Map::class)();
        /** @var \SplObjectStorage $elements */
        $elements = \Closure::bind(fn() => $this->elements, $polygons, Elements::class)();

        foreach ($elements as $element) {
            $this->getMap()->removePolygon($element);
            break;
        }
    }

    #[LiveAction]
    public function addRandomPolyline(): void
    {
        $cities = require __dir__ . '/../../../config/cities.php';
        $edgesCount = random_int(3, 6);

        $points = [];
        for ($i = 0; $i < $edgesCount; ++$i) {
            $city = $cities[array_rand($cities)];
            $points[] = new Point($city['latitude'], $city['longitude']);
        }

        $this->getMap()->addPolyline(new Polyline(
            points: $points,
            infoWindow: new InfoWindow('Polyline', opened: true),
        ));
    }

    #[LiveAction]
    public function removeFirstPolyline(): void
    {
        /** @var Polylines $polylines */
        $polylines = \Closure::bind(fn() => $this->polylines, $this->getMap(), Map::class)();
        /** @var \SplObjectStorage $elements */
        $elements = \Closure::bind(fn() => $this->elements, $polylines, Elements::class)();

        foreach ($elements as $element) {
            $this->getMap()->removePolyline($element);
            break;
        }
    }

    #[LiveAction]
    public function addRandomCircle(): void
    {
        $cities = require __dir__ . '/../../../config/cities.php';
        $city = $cities[array_rand($cities)];

        dump($city);
        $this->getMap()->addCircle(new \Symfony\UX\Map\Circle(
            center: new Point($city['latitude'], $city['longitude']),
            radius: random_int(50_000, 150_000),
            infoWindow: new InfoWindow($city['label'], opened: true),
        ));
    }

    #[LiveAction]
    public function removeFirstCircle(): void
    {
        /** @var \Symfony\UX\Map\Circles $circles */
        $circles = \Closure::bind(fn() => $this->circles, $this->getMap(), Map::class)();
        /** @var \SplObjectStorage $elements */
        $elements = \Closure::bind(fn() => $this->elements, $circles, Elements::class)();

        foreach ($elements as $element) {
            $this->getMap()->removeCircle($element);
            break;
        }
    }

    #[LiveAction]
    public function addRandomRectangle(): void
    {
        $cities = require __dir__ . '/../../../config/cities.php';
        $city = $cities[array_rand($cities)];

        $this->getMap()->addRectangle(new \Symfony\UX\Map\Rectangle(
            southWest: new Point($city['latitude'] - 0.2, $city['longitude'] - 0.2),
            northEast: new Point($city['latitude'] + 0.2, $city['longitude'] + 0.2),
            infoWindow: new InfoWindow($city['label'], opened: true),
        ));
    }

    #[LiveAction]
    public function removeFirstRectangle(): void
    {
        /** @var \Symfony\UX\Map\Rectangles $rectangles */
        $rectangles = \Closure::bind(fn() => $this->rectangles, $this->getMap(), Map::class)();
        /** @var \SplObjectStorage $elements */
        $elements = \Closure::bind(fn() => $this->elements, $rectangles, Elements::class)();

        foreach ($elements as $element) {
            $this->getMap()->removeRectangle($element);
            break;
        }
    }
}
