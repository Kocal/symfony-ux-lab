<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Icons2148Controller extends AbstractController
{
    #[Route('/icons2148', name: 'app_icons2148')]
    public function index(): Response
    {
        return $this->render('icons2148/index.html.twig');
    }
}
