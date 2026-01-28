<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Search;

final class SearchResult
{
    /** @var list<SearchMatch> */
    public readonly array $matches;

    /**
     * @param list<SearchMatch> $matches
     */
    public function __construct(
        public readonly int $count,
        array $matches,
    ) {
        $this->matches = $matches;
    }
}
