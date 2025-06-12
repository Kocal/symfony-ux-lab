<?php

declare(strict_types=1);

namespace App\Tests\Mercure;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Mercure\HubInterface;

final  class TestPublishingTest extends KernelTestCase
{
    public function testPublishing(): void
    {
        $hub = self::getContainer()->get(HubInterface::class);
        dump($hub);
    }
}
