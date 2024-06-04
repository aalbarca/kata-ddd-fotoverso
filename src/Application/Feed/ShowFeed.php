<?php

namespace Netflie\Kata\Application\Feed;

use Netflie\Kata\Domain\Feed\Feed;
use Netflie\Kata\Domain\Feed\FeedNotFound;
use Netflie\Kata\Domain\Feed\MemberId;
use Netflie\Kata\Domain\Shared\Bus\Event\DomainEventPublisher;

final class ShowFeed
{
    public function __construct(
        private FeedRepository $feedRepository,
        private DomainEventPublisher $eventPublisher
    ) {
    }

    public function __invoke(
      string $userId
    ): Feed {
        $feed = $this->feedRepository->getByMember(new MemberId($userId));

        if (null === $feed) {
          throw new FeedNotFound();
        }

        $this->eventPublisher->publish(new FeedWasShown($feed->id));

        return $feed;
    }
}