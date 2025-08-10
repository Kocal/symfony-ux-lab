<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LiveComponentWithValidationController extends AbstractController
{
    #[Route('/live/component/with/validation', name: 'app_live_component_with_validation')]
    public function index(): Response
    {
        return $this->render('live_component_with_validation/index.html.twig', [
            'controller_name' => 'LiveComponentWithValidationController',
        ]);
    }
}
