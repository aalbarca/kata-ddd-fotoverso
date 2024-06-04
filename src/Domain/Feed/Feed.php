<?php

namespace Netflie\Kata\Domain\Feed;

final class Feed implements \JsonSerializable
{
    private array $posts;

    public function __construct(
        private FeedId $id,
        private MemberId $memberId,
        FeedPost ...$posts
    ) {
        $this->posts = $posts;
    }

    public function id(): FeedId
    {
        return $this->id;
    }

    public function memberId(): MemberId
    {
        return $this->memberId;
    }

    public function posts(): array
    {
        return $this->posts;
    }

    public function countPosts(): int
    {
        return count($this->posts);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => (string) $this->id,
            'memberId' => (string) $this->memberId,
            'posts' => $this->posts,
            'count_posts' => $this->countPosts(),
        ];
    }
}