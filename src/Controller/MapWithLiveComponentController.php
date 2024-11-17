<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MapWithLiveComponentController extends AbstractController
{
    #[Route('/map/with_live_component', name: 'app_map_with_live_component')]
    public function index(): Response
    {
        return $this->render('map_with_live_component/index.html.twig');
    }
}
