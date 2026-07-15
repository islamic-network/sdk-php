<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Quotes;

/** Envelope for GET /quotes/{id} and GET /quotes/random. */
final class QuoteResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly QuoteEntry $data,
    ) {
    }
}
