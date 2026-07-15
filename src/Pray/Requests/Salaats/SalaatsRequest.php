<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\Requests\Salaats;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

final class SalaatsRequest
{
    public readonly PaginationOptions $options;

    public function __construct(?PaginationOptions $options = null)
    {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/salaats';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
