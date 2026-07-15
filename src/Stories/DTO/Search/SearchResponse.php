<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Search;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /search. */
final class SearchResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly SearchData $data,
        public readonly ?Meta $meta = null,
    ) {
    }
}
