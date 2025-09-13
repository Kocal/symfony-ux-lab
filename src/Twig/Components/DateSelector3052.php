<?php

declare(strict_types=1);

namespace App\Twig\Components;

use Carbon\CarbonImmutable;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentToolsTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent(template: 'components/date_selector_3052.html.twig')]
final class DateSelector3052
{
    use DefaultActionTrait;
    use ComponentToolsTrait;

    #[LiveProp(writable: true, url: new UrlMapping(mapPath: true))]
    public ?string $id = null;

    #[LiveProp(writable: true, url: new UrlMapping(mapPath: true))]
    public ?string $id3 = 'foo';

    #[LiveProp(writable: true, format: 'Y-m-d', url: true)]
    public ?CarbonImmutable $start = null;

    #[LiveProp(writable: true, format: 'Y-m-d', url: true)]
    public ?CarbonImmutable $end = null;

    #[LiveAction]
    public function setRange(#[LiveArg] string $preset): void
    {
        $this->id = (string) random_int(1, 300);

        $today = CarbonImmutable::today();

        switch ($preset) {
            case 'today':
                $this->start = $today->startOfDay();
                $this->end = $today->endOfDay();
                break;

            case 'this_month':
                $this->start = $today->startOfMonth()->startOfDay();
                $this->end = $today->endOfMonth()->endOfDay();
                break;
        }
    }

    #[PostMount]
    public function postMount() {
        dump($this);
    }

    public function matchesPreset(string $preset): bool
    {
        $today = CarbonImmutable::today();

        return match ($preset) {
            'today' => $this->start?->isSameDay($today) && $this->end?->isSameDay($today),
            'this_month' => $this->start?->isSameDay($today->startOfMonth()) && $this->end?->isSameDay($today->endOfMonth()),
            default => false,
        };
    }
}
