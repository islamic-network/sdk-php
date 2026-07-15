<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\Requests\People;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /people — people referenced by events, slug order, paginated. */
final class PeopleRequest
{
    public readonly PaginationOptions $options;

    public function __construct(?PaginationOptions $options = null)
    {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/people';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
