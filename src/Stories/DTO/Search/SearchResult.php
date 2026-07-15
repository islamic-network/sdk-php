<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Search;

/** GET /search result entry: a story reference plus the field paths that matched. */
final class SearchResult
{
    /** @var list<string> */
    public readonly array $matched_in;

    /** @var array<non-empty-string, string> */
    public readonly array $title;

    /**
     * @param list<string> $matched_in
     * @param array<non-empty-string, string> $title
     */
    public function __construct(
        public readonly string $type,
        public readonly string $slug,
        public readonly string $published,
        public readonly string $url,
        array $matched_in,
        array $title,
    ) {
        $this->matched_in = $matched_in;
        $this->title = $title;
    }
}
