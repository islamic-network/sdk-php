<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\People;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /people/{slug}/quotes. */
final class PersonQuotesResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly PersonQuotesData $data,
        public readonly ?Meta $meta = null,
    ) {
    }
}
