<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\Requests\Search;

use IslamicNetwork\BoycottIsraeli\Requests\PaginationOptions;

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
        return '/search/' . rawurlencode($this->query);
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
