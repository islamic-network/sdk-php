<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Search;

final class SearchResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly SearchResult $data,
    ) {
    }
}
