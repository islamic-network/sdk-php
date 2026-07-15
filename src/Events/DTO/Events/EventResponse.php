<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Events;

/** Envelope for GET /events/{slug}. */
final class EventResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly EventDetail $data,
    ) {
    }
}
