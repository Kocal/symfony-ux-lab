<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\Map\Bridge\Google\GoogleOptions;
use Symfony\UX\Map\InfoWindow;
use Symfony\UX\Map\Live\ComponentWithMapTrait;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;
use Symfony\UX\Map\Polygon;
use Symfony\UX\Map\Polyline;

#[AsLiveComponent]
final class MapLivePlayground
{
    use DefaultActionTrait;
    use ComponentWithMapTrait;

    protected function instantiateMap(): Map
    {
        return (new Map())
            ->options(new GoogleOptions(
                mapId: '2b2d73ba4b8c7b41',
                backgroundColor: '#fddfdd',
            ))
            ->center(new Point(48.8566, 2.3522))
            ->zoom(7)
            ->addMarker(new Marker(
                position: new Point(48.8566, 2.3522),
                title: 'Paris',
                infoWindow: new InfoWindow('Paris'),
            ))
            ->addMarker(new Marker(
                position: new Point(45.75, 4.85),
                title: 'Lyon',
                infoWindow: new InfoWindow('Lyon'),
            ))
            ->addMarker(new Marker(
                position: new Point(43.6047, 1.4442),
                title: 'Toulouse',
                infoWindow: new InfoWindow('Toulouse'),
            ))
            ->addPolygon(new Polygon(
                points: [
                    new Point(48.8566, 2.3522),
                    new Point(45.75, 4.85),
                    new Point(43.6047, 1.4442),
                ],
            ))
            ->addPolygon(new Polygon(
                points: [
                    new Point(1.4442, 43.6047),
                    new Point(4.85, 45.75),
                    new Point(2.3522, 48.8566),
                ],
                infoWindow: new InfoWindow('Polygon', extra: ['foo' => 'bar']),
                extra: ['fillColor' => '#ff0000'],
            )) // */
            //*
            ->addPolyline(new Polyline(
            // Rennes to Paris to Vienna
                points: [
                    new Point(48.1173, -1.6778),
                    new Point(48.8566, 2.3522),
                    new Point(48.2082, 16.3738),
                ],
                infoWindow: new InfoWindow('Polyline', extra: ['foo' => 'bar']),
                extra: ['strokeColor' => '#ff0000'],
            )) // */
            ;
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
        $cities = require __dir__ . '/../../../CONFIG/cities.php';
        $city = $cities[array_rand($cities)];

        //$this->mapRepository->save(/* ... */);

        $this->getMap()->addMarker(new Marker(
            position: new Point($city['latitude'], $city['longitude']),
            title: $city['label'],
            infoWindow: new InfoWindow($city['label']),
        ));
    }

    #[LiveAction]
    public function clearAndAddRandomMarkers(): void
    {
        $map = $this->getMap();
        $reflPropertyMarkers = new \ReflectionProperty($map, 'markers');
        $reflPropertyMarkers->setValue($map, []);

        $map
            ->addMarker(new Marker(position: new Point(48.8566, 2.3522), title: 'Paris', infoWindow: new InfoWindow('Paris'),))
            ->addMarker(new Marker(position: new Point(45.75, 4.85), title: 'Lyon', infoWindow: new InfoWindow('Lyon'),))
            ->addMarker(new Marker(position: new Point(43.6047, 1.4442), title: 'Toulouse', infoWindow: new InfoWindow('Toulouse')))
        ;

        for ($i = 0; $i < 5; $i++) {
            $this->addRandomMarker();
        }
    }

    #[LiveAction]
    public function addRandomPolygon(): void
    {
        $cities = require __dir__ . '/../../../CONFIG/cities.php';
        $edgesCount = random_int(3, 6);

        $points = [];
        for ($i = 0; $i < $edgesCount; ++$i) {
            $city = $cities[array_rand($cities)];
            $points[] = new Point($city['latitude'], $city['longitude']);
        }

        $this->getMap()->addPolygon(new Polygon(
            points: $points,
            infoWindow: new InfoWindow('Polygon'),
        ));
    }

    #[LiveAction]
    public function addRandomPolyline(): void
    {
        $cities = require __dir__ . '/../../../CONFIG/cities.php';
        $edgesCount = random_int(3, 6);

        $points = [];
        for ($i = 0; $i < $edgesCount; ++$i) {
            $city = $cities[array_rand($cities)];
            $points[] = new Point($city['latitude'], $city['longitude']);
        }

        $this->getMap()->addPolyline(new Polyline(
            points: $points,
            infoWindow: new InfoWindow('Polyline'),
        ));
    }
}
