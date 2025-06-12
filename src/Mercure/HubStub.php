<?php

declare(strict_types=1);

namespace App\Mercure;

use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Jwt\TokenFactoryInterface;
use Symfony\Component\Mercure\Jwt\TokenProviderInterface;
use Symfony\Component\Mercure\Update;

final readonly class HubStub implements HubInterface
{
    public function __construct(
        private string $publicUrl,
    ) {
    }

    public function getUrl(): string
    {
        // TODO: Implement getUrl() method.
    }

    public function getPublicUrl(): string
    {
        return $this->publicUrl;
    }

    public function getProvider(): TokenProviderInterface
    {
        // TODO: Implement getProvider() method.
    }

    public function getFactory(): ?TokenFactoryInterface
    {
        // TODO: Implement getFactory() method.
    }

    public function publish(Update $update): string
    {
        return 'id';
    }
}
