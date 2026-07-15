<?php

declare(strict_types=1);

namespace IslamicNetwork\People\Requests\People;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /people/{slug}/events — the person's full event list, paginated. */
final class PersonEventsRequest
{
    public readonly PaginationOptions $options;

    public function __construct(
        public readonly string $slug,
        ?PaginationOptions $options = null,
    ) {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/people/' . rawurlencode($this->slug) . '/events';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
