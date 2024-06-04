<?php

namespace Netflie\Kata\Application\Post;

final class CreatePost
{
    public function __construct(
      private PostRepository $postRepository,
      private MemberRepository $memberRepository,
      private DomainEventPublisher $eventPublisher
    ){}

    public function execute(string $userId, string $title, string $content, string $picture_url): void
    {
        $member = $this->memberRepository->get(new MemberId($userId));

        if (null === $member) {
            throw new MemberNotFoundException();
        }

        $post = Post::create(
          PostId::create(),
          new PostAuthorId($member->id()),
          new PostTitle($title),
          new PostContent($content),
          new PostPictureUrl($picture_url)
        );

        $this->postRepository->save($post);

        $this->eventPublisher->publis($post->pullDomainEvents());
    }
}
