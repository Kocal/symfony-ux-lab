<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent]
final class ComponentWithValidation
{
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[LiveProp(writable: true)]
    #[Assert\Choice(choices: ['foo', 'bar'])]
    public string $type;

    #[PostMount]
    public function initialValidation(): void
    {
        $this->validate(false);
    }
}
