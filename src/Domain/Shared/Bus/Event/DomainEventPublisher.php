<?php

namespace Netflie\Kata\Domain\Shared\Bus\Event;

interface DomainEventPublisher
{
    public function publish(DomainEvent ...$events): void;
}