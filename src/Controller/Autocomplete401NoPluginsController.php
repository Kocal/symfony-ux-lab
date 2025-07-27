<?php

namespace App\Controller;

use App\Form\FoodAutocompleteField;
use App\Repository\FoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class Autocomplete401NoPluginsController extends AbstractController
{
    #[Route('/autocomplete401/no/plugins', name: 'app_autocomplete401_no_plugins')]
    public function index(FoodRepository $foodRepository): Response
    {
        if (!$foodRepository->hasResults()) {
            $foodRepository->initFixtures();
        }

        $form = $this->createFormBuilder()
            ->add('food', FoodAutocompleteField::class, [
                'tom_select_options' => [
                    'plugins' => ['clear_button' => false],
                ],
            ])
            ->getForm()
        ;

        return $this->render('autocomplete401_no_plugins/index.html.twig', [
            'controller_name' => 'Autocomplete401NoPluginsController',
            'form' => $form,
        ]);
    }
}
