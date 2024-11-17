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

#[AsLiveComponent]
final class MapLivePlayground
{
    use DefaultActionTrait;
    use ComponentWithMapTrait;

    protected function instantiateMap(): Map
    {
        return (new Map())
//            ->options(new GoogleOptions(
//                mapId: '2b2d73ba4b8c7b41',
//                backgroundColor: '#fddfdd',
//            ))
            ->center(new Point(48.8566, 2.3522))
            ->zoom(7)
//            ->addMarker(new Marker(
//                position: new Point(48.8566, 2.3522),
//                title: 'Paris',
//                infoWindow: new InfoWindow('Paris'),
//            ))
//            ->addMarker(new Marker(
//                position: new Point(45.75, 4.85),
//                title: 'Lyon',
//                infoWindow: new InfoWindow('Lyon'),
//            ))
//            ->addMarker(new Marker(
//                position: new Point(43.6047, 1.4442),
//                title: 'Toulouse',
//                infoWindow: new InfoWindow('Toulouse'),
//            ))
        ;
    }

    #[LiveAction]
    public function randomCenter(): void
    {
        $this->getMap()->center(new Point(random_int(3000, 5000)/100, random_int(200, 500)/100));
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
        $cities = require_once __DIR__ . '/../../../config/cities.php';
        $city = $cities[array_rand($cities)];

        //$this->mapRepository->save(/* ... */);

        $this->getMap()->addMarker(new Marker(
            position: new Point($city['latitude'], $city['longitude']),
            title: $city['label'],
            infoWindow: new InfoWindow($city['label']),
        ));
    }

    #[LiveAction]
    public function addRandomPolygon(): void
    {
        $cities = require_once __DIR__ . '/../../../config/cities.php';
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
}
