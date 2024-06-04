<?php

namespace Netflie\Kata\Domain\Feed;

final class FeedNotFound extends \Exception
{
    public function __construct()
    {
        parent::__construct('Feed not found');
    }
}