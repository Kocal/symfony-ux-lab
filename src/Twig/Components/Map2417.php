<?php
declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\Map\Live\ComponentWithMapTrait;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;

#[AsLiveComponent]
final class Map2417
{
    use DefaultActionTrait;
    use ComponentWithMapTrait;

    #[LiveProp]
    public array|null $position = [];

    protected function instantiateMap(): Map
    {
        $map = new Map();

        $latitude = $this->position['latitude'] ?? null;
        $longitude = $this->position['longitude'] ?? null;

        if ($latitude && $longitude) {
            $map
                ->addMarker(new Marker(new Point(floatval($latitude), floatval($longitude))))
                ->fitBoundsToMarkers();
        } else {
            $map
                ->center(new Point(48.8566, 2.3522))
                ->zoom(6);
        }

        return $map;
    }
}
