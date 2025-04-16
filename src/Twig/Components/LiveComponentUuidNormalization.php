<?php

namespace App\Twig\Components;

use Symfony\Component\Uid\Ulid;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Uid\UuidV7;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsLiveComponent]
final class LiveComponentUuidNormalization
{
    use DefaultActionTrait;

    #[LiveProp]
    public UuidV4 $uuidV4;
    #[LiveProp]
    public UuidV7 $uuidV7;
    #[LiveProp]
    public Ulid $ulid;
    #[LiveProp]
    public \DateTimeImmutable $dateTime;

    #[PreMount]
    public function preMount(array $data): array
    {
        $data['dateTime'] = new \DateTimeImmutable();

        return $data;
    }

    #[LiveAction]
    public function refresh(): void
    {
        $this->uuidV4 = new UuidV4();
        $this->uuidV7 = new UuidV7();
        $this->ulid = new Ulid();
        $this->dateTime = new \DateTimeImmutable();
    }
}
