<?php

namespace App\Twig\Components;

use App\DumbDto;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class TonsOfLiveProp
{
    use DefaultActionTrait;

    #[LiveProp]
    public \DateTimeImmutable $createdAt;

    #[LiveProp]
    public DumbDto $dumbDto;

    #[LiveProp]
    public int $prop1 = 1;

    #[LiveProp]
    public string $name = 'John';

    #[LiveProp]
    public float $price = 19.99;

    #[LiveProp]
    public array $tags = ['tag1', 'tag2'];

    #[LiveProp]
    public ?string $description = null;

    #[LiveProp]
    public int $quantity = 0;

    #[LiveProp]
    public string $color = '#FF0000';

    #[LiveProp]
    public bool $isVisible = false;

    #[LiveProp]
    public float $rating = 4.5;

    #[LiveProp]
    public array $options = ['option1', 'option2'];

    #[LiveProp]
    public ?int $maxItems = 10;

    #[LiveProp]
    public string $status = 'pending';

    #[LiveProp]
    public bool $isEnabled = true;

    #[LiveProp]
    public float $discount = 0.0;

    #[LiveProp]
    public array $categories = ['cat1', 'cat2'];

    #[LiveProp]
    public ?string $imageUrl = null;

    #[LiveProp]
    public int $views = 0;

    #[LiveProp]
    public string $theme = 'light';

    #[LiveProp]
    public bool $isExpanded = false;

    #[LiveProp]
    public float $progress = 0.0;

    #[LiveProp]
    public array $permissions = ['read', 'write'];

    #[LiveProp]
    public bool $isActive = true;

    #[LiveProp]
    public string $currency = 'USD';

    #[LiveProp]
    public int $pageSize = 25;

    #[LiveProp]
    public float $taxRate = 0.21;

    #[LiveProp]
    public ?string $lastModified = null;

    #[LiveProp]
    public int $refreshInterval = 60;

    #[LiveProp]
    public string $layout = 'grid';

    #[LiveProp]
    public bool $isLoading = false;

    #[LiveProp]
    public float $opacity = 1.0;

    #[LiveProp]
    public array $filters = ['all', 'active'];

    #[LiveProp]
    public ?int $timeout = 30;

    #[LiveProp]
    public string $sortBy = 'name';

    #[LiveProp]
    public bool $isDraggable = true;

    #[LiveProp]
    public float $scale = 1.0;

    #[LiveProp]
    public array $notifications = ['email', 'sms'];

    #[LiveProp]
    public ?string $apiKey = null;

    #[LiveProp]
    public int $retryCount = 3;

    #[LiveProp]
    public string $language = 'en';

    #[LiveProp]
    public bool $isEditable = true;

    #[LiveProp]
    public float $brightness = 100.0;

    #[LiveProp]
    public array $roles = ['user', 'admin'];

    #[LiveProp]
    public ?int $cacheTime = 3600;

    #[LiveProp]
    public string $timezone = 'UTC';

    #[LiveProp]
    public bool $isResizable = true;

    #[LiveProp]
    public float $contrast = 1.0;

    #[LiveProp]
    public array $preferences = ['dark', 'compact'];

    #[LiveProp]
    public ?string $secretKey = null;

    #[LiveProp]
    public int $maxRetries = 5;

    public function mount(): void
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->dumbDto = new DumbDto;
        $this->dumbDto->stringProp = 'John';
        $this->dumbDto->intProp = 42;
        $this->dumbDto->arrayProp = ['foo', 'bar'];
    }

    #[LiveAction]
    public function updateSomeProps(): void
    {
        $this->prop1 += 1;
        $this->price *= 1.1;
        $this->tags[] = 'tag' . $this->prop1;
        $this->isVisible = !$this->isVisible;
        $this->dumbDto->stringProp = 'Jane' . $this->prop1;
        $this->dumbDto->intProp += 1;
        $this->dumbDto->arrayProp[] = 'tag' . $this->prop1;
    }
}
