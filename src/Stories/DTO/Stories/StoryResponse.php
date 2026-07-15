<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Stories;

/** Envelope for GET /stories/{slug}. */
final class StoryResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly StoryDetail $data,
    ) {
    }
}
