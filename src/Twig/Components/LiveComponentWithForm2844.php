<?php

namespace App\Twig\Components;

use App\Form\Form2844Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class LiveComponentWithForm2844 extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    protected function instantiateForm(): FormInterface
    {
        // 1. with createForm
//        return $this->createForm(Form2844Type::class);

        // 2. with form builder
        $formBuilder = $this->createFormBuilder();
        $formBuilder->add('field_name', TextType::class);
        return $formBuilder->getForm();
    }
}
