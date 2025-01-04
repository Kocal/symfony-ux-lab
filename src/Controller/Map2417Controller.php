<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Map2417Controller extends AbstractController
{
    #[Route('/map2417', name: 'app_map2417')]
    public function index(): Response
    {
        return $this->render('map2417/index.html.twig', [
            'controller_name' => 'Map2417Controller',
        ]);
    }
}
