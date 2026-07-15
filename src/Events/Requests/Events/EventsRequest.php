<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\Requests\Events;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /events — all events (summaries) in calendar order, paginated. */
final class EventsRequest
{
    public readonly PaginationOptions $options;

    public function __construct(?PaginationOptions $options = null)
    {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/events';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
