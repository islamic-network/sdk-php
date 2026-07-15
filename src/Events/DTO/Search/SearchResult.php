<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Search;

use IslamicNetwork\Events\DTO\Common\EventDate;
use IslamicNetwork\Events\DTO\Common\Year;

/** GET /search result entry: an event summary plus the field paths that matched. */
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
        public readonly string $id,
        public readonly string $slug,
        public readonly EventDate $date,
        public readonly string $url,
        array $matched_in,
        array $title,
        public readonly ?Year $year = null,
    ) {
        $this->matched_in = $matched_in;
        $this->title = $title;
    }
}
