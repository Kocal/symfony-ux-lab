<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LiveComponent3052Controller extends AbstractController
{
    ##[Route(
    #    '/live-component3052/{id}/{id2}',
    #    requirements: ['id' => '\d+', 'id2' => '\d+'],
    #    defaults: ['_foo' => 'bar']
    #)]
    public function index(): Response
    {
        return $this->render('live_component3052/index.html.twig');
    }
}
