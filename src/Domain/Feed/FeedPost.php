<?php

namespace Netflie\Kata\Domain\Feed;

final class FeedPost implements \JsonSerializable
{
    private array $comments;

    public function __construct(
        private FeedPostId $id,
        private FeedPostUrl $url,
        private FeedPostPicture $picture,
        private FeedPostContent $content,
        private int $countComments,
        private int $countLikes,
        private \DateTimeImmutable $createdAt,
        FeedPostComments ...$comments
    ) {
        $this->comments = $comments;
    }

    public function id(): FeedPostId
    {
        return $this->id;
    }

    public function url(): FeedPostUrl
    {
        return $this->url;
    }

    public function picture(): FeedPostPicture
    {
        return $this->picture;
    }

    public function content(): FeedPostContent
    {
        return $this->content;
    }

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function comments(): array
    {
        return $this->comments;
    }

    public function countComments(): int
    {
        return $this->countComments;
    }

    public function countLikes(): int
    {
        return $this->countLikes;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => (string) $this->id,
            'url' => (string) $this->url,
            'picture' => (string) $this->picture,
            'content' => (string) $this->content,
            'count_comments' => $this->countComments(),
            'count_likes' => $this->countLikes(),
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
            'comments' => $this->comments,
        ];
    }
}