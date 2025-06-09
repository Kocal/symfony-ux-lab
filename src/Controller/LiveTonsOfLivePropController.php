<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LiveTonsOfLivePropController extends AbstractController
{
    #[Route('/live/tons_of_live_prop', name: 'app_live_tons_of_live_prop')]
    public function index(): Response
    {
        return $this->render('live_tons_of_live_prop/index.html.twig', [
            'controller_name' => 'LiveTonsOfLivePropController',
        ]);
    }
}
