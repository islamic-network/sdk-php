<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\Requests\Search;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /search?q= — diacritic-folded across original text, translations, sources and tags. */
final class SearchRequest
{
    public readonly PaginationOptions $options;

    public function __construct(
        public readonly string $query,
        ?PaginationOptions $options = null,
    ) {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/search';
    }

    /**
     * @return array<string, int|string>
     */
    public function toQuery(): array
    {
        return array_merge(['q' => $this->query], $this->options->toQuery());
    }
}
