<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Search;

/** GET /search payload: the query, the total hit count and the result page. */
final class SearchData
{
    /** @var list<SearchResult> */
    public readonly array $results;

    /**
     * @param list<SearchResult> $results
     */
    public function __construct(
        public readonly string $query,
        public readonly int $total,
        array $results,
    ) {
        $this->results = $results;
    }
}
