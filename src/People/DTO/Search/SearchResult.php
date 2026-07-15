<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\Search;

/** GET /search result entry: a person summary plus the field paths that matched. */
final class SearchResult
{
    /** @var list<string> */
    public readonly array $matched_in;

    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $honorific;

    /**
     * @param list<string> $matched_in
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, string>|null $honorific
     */
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $slug,
        public readonly string $kind,
        public readonly string $url,
        array $matched_in,
        array $name,
        ?array $honorific = null,
    ) {
        $this->matched_in = $matched_in;
        $this->name = $name;
        $this->honorific = $honorific;
    }
}
