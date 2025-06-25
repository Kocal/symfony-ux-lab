<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MapTwigFunctionController extends AbstractController
{
    #[Route('/map/twig/function', name: 'app_map_twig_function')]
    public function index(): Response
    {
        return $this->render('map_twig_function/index.html.twig', [
            'controller_name' => 'MapTwigFunctionController',
        ]);
    }
}
