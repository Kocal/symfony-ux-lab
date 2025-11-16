<?php

namespace App\Twig\Components;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsLiveComponent]
final class LiveComponentWithDependency
{
    use DefaultActionTrait;

    public function __construct(
        private HttpClientInterface $httpClient
    ) {
    }

    #[PreMount]
    public function preMount(array $data): array
    {
        $this->doRequest();

        return $data;
    }

    #[LiveAction]
    public function request(): void
    {
        $this->doRequest();
    }

    private function doRequest(): void
    {
        //dump($this->httpClient);
        $r = $this->httpClient->request('GET', 'https://symfony.com');
        dump($r->getStatusCode());
    }
}
