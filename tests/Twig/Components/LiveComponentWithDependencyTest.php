<?php

declare(strict_types=1);

namespace App\Tests\Twig\Components;

use App\Twig\Components\LiveComponentWithDependency;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\UX\LiveComponent\Test\InteractsWithLiveComponents;

final class LiveComponentWithDependencyTest extends KernelTestCase
{
    use InteractsWithLiveComponents;

    public function testComponent(): void
    {
        $container = static::getContainer();
        $container->set('http_client', new MockHttpClient(new MockResponse('<empty>', ['http_code' => 400])));

        $component = $this->createLiveComponent(LiveComponentWithDependency::class);
        $component->render();

        $component->call('request');
    }
}
