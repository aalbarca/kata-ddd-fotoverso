<?php

namespace Netflie\Kata\Domain\Feed;

final class FeedPostUrl
{
    public function __construct(
        private string $url
    ) {
        $this->guardValidUrl($url);
    }

    public function __toString(): string
    {
        return $this->url;
    }

    private function guardValidUrl(string $url): void
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Invalid URL');
        }
    }
}