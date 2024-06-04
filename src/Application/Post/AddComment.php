<?php

namespace Netflie\Kata\Application\Post;

final class AddComment
{
    public function __construct(
      private PostRepository $postRepository,
      private DomainEventPublisher $eventPublisher
    ){}

    public function execute(string $postId, string $userId, string $content): void
    {
        $post = $this->postRepository->get(new PostId($postId));

        if (null === $post) {
            throw new PostNotFoundException();
        }

        $post->addComment(
          CommentId::create(),
          new CommentAuthorId($userId),
          new CommentContent($content)
        );

        $this->postRepository->save($post);

        $this->eventPublisher->publish($post->pullDomainEvents());
    }
}