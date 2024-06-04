<?php

namespace Netflie\Kata\Domain\Feed;

final class MemberId
{
    public function __construct(
        private string $id
    ) {
        $this->guardIsValidUuid($id);
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    private function guardIsValidUuid(string $id): void
    {
        if (!\Ramsey\Uuid\Uuid::isValid($id)) {
            throw new \InvalidArgumentException('Invalid member id');
        }
    }
}