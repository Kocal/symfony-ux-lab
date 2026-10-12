<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Image\Provider\ProviderInterface;

final class ImageController extends AbstractController
{
    #[Route('/image', name: 'app_image')]
    public function index(#[Autowire(service: 'ux_image.provider')] ProviderInterface $provider): Response
    {
        return $this->render('image/index.html.twig', [
            'provider' => $provider->getName(),
        ]);
    }
}
