<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;

class Map2445Controller extends AbstractController
{
    #[Route('/map2445', name: 'app_map2445')]
    public function index(
        #[Autowire(env: 'UX_MAP_DSN')]
        string $uxMapDsn
    ): Response
    {
        if (!str_starts_with($uxMapDsn, 'leaflet://')) {
            throw new \InvalidArgumentException('The UX_MAP_DSN environment variable must start with "leaflet://" to display the page.');
        }

        $map = (new Map())
            ->center(new Point(48.8566, 2.3522))
            ->zoom(6)
            ->addMarker(new Marker(position: new Point(48.8566, 2.3522), title: 'Paris'))
        ;

        return $this->render('map2445/index.html.twig', [
            'map' => $map,
        ]);
    }
}
