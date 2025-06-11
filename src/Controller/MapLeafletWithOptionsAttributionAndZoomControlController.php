<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Bridge\Leaflet\LeafletOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\ControlPosition;
use Symfony\UX\Map\Bridge\Leaflet\Option\ZoomControlOptions;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Point;

final class MapLeafletWithOptionsAttributionAndZoomControlController extends AbstractController
{
    #[Route('/map/leaflet_with_options_attribution_and_zoom_control', name: 'app_map_leaflet_with_options_attribution_and_zoom_control')]
    public function index(): Response
    {
        $map = new Map();
        $map->center(new Point(48.8566, 2.3522));
        $map->zoom(6);
        $map->options(new LeafletOptions(
            zoomControlOptions: new ZoomControlOptions(position: ControlPosition::TOP_RIGHT),
//            attributionControl: false
        ));

        return $this->render('map_leaflet_with_options_attribution_and_zoom_control/index.html.twig', [
            'controller_name' => 'MapLeafletWithOptionsAttributionAndZoomControlController',
            'map' => $map,
        ]);
    }
}
