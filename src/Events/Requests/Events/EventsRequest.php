<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\Requests\Events;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /events — all events (summaries) in calendar order, paginated. Optional `?category=` filter (e.g. `birth`). */
final class EventsRequest
{
    public readonly PaginationOptions $options;

    public function __construct(
        ?PaginationOptions $options = null,
        public readonly ?string $category = null,
    ) {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/events';
    }

    /**
     * @return array<string, int|string>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->category !== null) {
            $query['category'] = $this->category;
        }

        return array_merge($query, $this->options->toQuery());
    }
}
