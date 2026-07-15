<?php

declare(strict_types=1);

namespace IslamicNetwork\People\Requests\People;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /people — the canonical registry, slug order. Optional `?kind=` filter (e.g. `companion`). */
final class PeopleRequest
{
    public readonly PaginationOptions $options;

    public function __construct(
        public readonly ?string $kind = null,
        ?PaginationOptions $options = null,
    ) {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/people';
    }

    /**
     * @return array<string, int|string>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->kind !== null) {
            $query['kind'] = $this->kind;
        }

        return array_merge($query, $this->options->toQuery());
    }
}
