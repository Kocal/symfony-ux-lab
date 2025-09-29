<?php

namespace App\Controller;

use App\Form\Form2844Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LiveComponentWithForm2844Controller extends AbstractController
{
    #[Route('/live/component/with/form2844', name: 'app_live_component_with_form2844')]
    public function index(): Response
    {
        $form1 = $this->createForm(Form2844Type::class);

        $formBuilder = $this->createFormBuilder();
        $formBuilder->add('field_name', TextType::class);
        $form2 = $formBuilder->getForm();

        return $this->render('live_component_with_form2844/index.html.twig', [
            'controller_name' => 'LiveComponentWithForm2844Controller',
            'form1' => $form1,
            'form2' => $form2,
        ]);
    }
}
