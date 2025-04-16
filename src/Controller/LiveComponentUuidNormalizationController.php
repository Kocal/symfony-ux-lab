<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Uid\Uuid;

class LiveComponentUuidNormalizationController extends AbstractController
{
    #[Route('/live/component/uuid/normalization', name: 'app_live_component_uuid_normalization')]
    public function index(): Response
    {
        return $this->render('live_component_uuid_normalization/index.html.twig', [
            'controller_name' => 'LiveComponentUuidNormalizationController',
            'uuidV4' => Uuid::v4(),
            'uuidV7' => Uuid::v7(),
            'ulid' => new Ulid(),
        ]);
    }
}
