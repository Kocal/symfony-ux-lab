<?php

namespace App\Controller;

use App\Form\FoodAutocompleteField;
use App\Repository\FoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class Autocomplete1128GetUrlController extends AbstractController
{
    #[Route('/autocomplete_1128_get_url', name: 'app_autocomplete1128_get_url')]
    public function index(FoodRepository $foodRepository): Response
    {
        if (!$foodRepository->hasResults()) {
            $foodRepository->initFixtures();
        }

        $form = $this->createFormBuilder()
            ->add('food', FoodAutocompleteField::class)
            ->getForm()
        ;

        return $this->render('autocomplete1128_get_url/index.html.twig', [
            'controller_name' => 'Autocomplete1128GetUrlController',
            'form' => $form
        ]);
    }
}
