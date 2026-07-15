<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Search;

use IslamicNetwork\Quotes\DTO\Quotes\Original;

/** GET /search result entry: a quote summary plus the field paths that matched. */
final class SearchResult
{
    /** @var list<string> */
    public readonly array $matched_in;

    /**
     * @param list<string> $matched_in
     */
    public function __construct(
        public readonly string $type,
        public readonly int $id,
        public readonly Original $original,
        public readonly string $url,
        array $matched_in,
        public readonly ?string $source = null,
    ) {
        $this->matched_in = $matched_in;
    }
}
