<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Icon\Icon;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;

class MapIconsController extends AbstractController
{
    #[Route('/map/icons', name: 'app_map_icons')]
    public function index(): Response
    {
        
        $map = (new Map())
            ->center(new Point(48.8566, 2.3522))
            ->zoom(6)
        ;

        $cities = require_once __DIR__.'/../../config/cities.php';
        foreach (array_slice($cities, 0, 500) as $i => $city) {
            $map->addMarker(new Marker(
                position: new Point($city['latitude'], $city['longitude']),
                title: $city['label'],
                icon: match(true) {
                    $i < 150 => Icon::ux('fa:map-marker'),
                    $i < 325 => Icon::url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/icons/geo-alt.svg'),
                    default => Icon::svg(file_get_contents(__DIR__.'/../../assets/icons/el/map-marker.svg')),
                }
                
            ));
        }

        return $this->render('map_icons/index.html.twig', [
            'controller_name' => 'MapIconsController',
            'map' => $map,
        ]);
    }
}
