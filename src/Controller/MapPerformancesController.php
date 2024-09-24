<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Bridge\Google\GoogleOptions;
use Symfony\UX\Map\InfoWindow;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;
use Symfony\UX\Map\Polygon;

class MapPerformancesController extends AbstractController
{
    #[Route('/map/performances', name: 'app_map_performances')]
    public function index(): Response
    {
        $map = new Map();
        $map->options(new GoogleOptions(
            mapId: '2b2d73ba4b8c7b41',
        ));
        $map->center(new Point(48.8566, 2.3522));
        $map->zoom(6);

//        for ($i = 0; $i < 1000; $i++) {
//            $map->addMarker(
//                new Marker(
//                    position: new Point(48.8566 + $i / 1000, 2.3522 + $i / 500),
//                    title: 'Marker ' . $i,
//                )
//            );
//        }

        $cities = require_once __DIR__.'/../../config/cities.php';
//        $cities = json_decode(file_get_contents(__DIR__ . '/../../config/cities.json'))->cities;
//        usort($cities, fn($a, $b) => $a->label <=> $b->label);
//        $cities = array_slice($cities, 0, 1000);
//        $cities = array_map(fn($city) => [
//            'label' => $city->label,
//            'latitude' => (float) $city->latitude,
//            'longitude' => (float) $city->longitude,
//        ], $cities);
         
        foreach ($cities as $i => $city) {
            $map->addMarker(
                new Marker(
                    position: new Point($city['latitude'], $city['longitude']),
                    title: $city['label'],
                    infoWindow: new InfoWindow(
                        headerContent: '<b>'.$city['label'].'</b>',
                        content: 'Welcome in '.$city['label'],
                        opened: $i === 300,
                    ),
                )
            );
        }

        return $this->render('map_performances/index.html.twig', [
            'map' => $map,
        ]);
    }
}
