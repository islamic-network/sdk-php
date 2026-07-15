<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\Requests\Search;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /search?q= — optional `type` is a comma-separated collection filter (e.g. `salaats,adhkaars`). */
final class SearchRequest
{
    public readonly PaginationOptions $options;

    public function __construct(
        public readonly string $query,
        public readonly ?string $type = null,
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
        $query = ['q' => $this->query];

        if ($this->type !== null) {
            $query['type'] = $this->type;
        }

        return array_merge($query, $this->options->toQuery());
    }
}
