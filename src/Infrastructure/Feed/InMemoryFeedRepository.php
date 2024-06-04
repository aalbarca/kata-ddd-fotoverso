<?php

namespace Netflie\Kata\Infrastructure\Feed;

use Netflie\Kata\Domain\Feed\FeedRepository;

final class InMemoryFeedRepository implements FeedRepository
{
    private array $feeds = [];

    public function getByMember(MemberId $memberId): Feed
    {
        return $this->feeds[(string) $memberId];
    }
}
