<?php

namespace Netflie\Kata\Domain\Feed;

use Netflie\Kata\Domain\Shared\Bus\Event\DomainEvent;

final class FeedWasShown extends DomainEvent
{
  public function __construct(private FeedId $feed_id)
  {}

  public function feedId(): FeedId
  {
    return $this->feed_id;
  }
}