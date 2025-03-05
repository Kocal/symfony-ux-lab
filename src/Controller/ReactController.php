<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\RouterInterface;

class ReactController extends AbstractController
{
    #[Route('/react', name: 'app_react')]
    public function index(RouterInterface $router): Response
    {
        return $this->render('react/index.html.twig');
    }
}
