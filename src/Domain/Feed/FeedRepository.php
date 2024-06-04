<?php

namespace Netflie\Kata\Domain\Feed;

interface FeedRepository
{
    public function getByMember(MemberId $memberId): Feed;
}