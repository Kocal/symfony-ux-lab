<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SvelteController extends AbstractController
{
    #[Route('/svelte', name: 'app_svelte')]
    public function index(): Response
    {
        return $this->render('svelte/index.html.twig');
    }
}
