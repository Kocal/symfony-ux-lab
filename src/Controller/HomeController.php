<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\RouterInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RouterInterface $router): Response
    {
        $routesNames = [];
        foreach ($router->getRouteCollection() as $routeName => $route) {
            if (!str_starts_with($routeName, 'app_') || $routeName === 'app_home') {
                continue;
            }
            
            $routesNames[] = $routeName;
        }
        
        return $this->render('home/index.html.twig', [
            'routes_names' => $routesNames,
        ]);
    }
}
