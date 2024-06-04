<?php

namespace Netflie\Kata\Domain\Post;

final class Post
{
    public function __construct(
        private PostId $postId,
        private PostOwnerId $postOwnerId,
        private PostTitle $postTitle,
        private PostContent $postContent,
        private PostPictureUrl $postPictureUrl,
        private \DateTimeInmutable $createdAt
    ){}

    public function create(
        PostId $postId,
        PostOwnerId $postOwnerId,
        PostTitle $postTitle,
        PostContent $postContent,
        PostPictureUrl $postPictureUrl
    ): self {
        $post = new self($postId, $postOwnerId, $postTitle, $postContent, $postPictureUrl, new \DateTimeInmutable());

        $post->recordEventDomain(new PostCreated(
            $video->id(),
            [
                'postOwnerId' => $video->postOwnerId()->value(),
                'postTitle' => $video->postTitle()->value(),
                'postContent' => $video->postContent()->value(),
                'postPictureUrl' => $video->postPictureUrl()->value(),
                'createdAt' => $video->createdAt()->format('Y-m-d H:i:s')
            ]
        ));
    }
}