<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Search;

use IslamicNetwork\Pray\DTO\Common\MonthRef;

/** GET /search result entry: a typed summary plus the field paths that matched. */
final class SearchResult
{
    /** @var list<string> */
    public readonly array $matched_in;

    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, list<string>>|null */
    public readonly ?array $highlights;

    /**
     * @param list<string> $matched_in
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, list<string>>|null $highlights
     */
    public function __construct(
        public readonly string $type,
        public readonly string $url,
        array $matched_in,
        array $name,
        public readonly ?string $id = null,
        public readonly ?int $number = null,
        public readonly ?string $slug = null,
        ?array $highlights = null,
        public readonly ?MonthRef $month = null,
    ) {
        $this->matched_in = $matched_in;
        $this->name = $name;
        $this->highlights = $highlights;
    }
}
