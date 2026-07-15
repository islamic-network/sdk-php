<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Recitations;

/** Envelope for GET /{salawaats|adhkaars|duas}/{slug}. */
final class RecitationResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly RecitationDetail $data,
    ) {
    }
}
