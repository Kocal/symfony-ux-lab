<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TonsOfIconsController extends AbstractController
{
    #[Route('/icons/tons-of-icons', name: 'app_icons_tons-of-icons')]
    public function index(): Response
    {
        return $this->render('icons_tons_of_icons/index.html.twig');
    }
}
