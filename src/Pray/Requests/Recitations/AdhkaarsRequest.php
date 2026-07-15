<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\Requests\Recitations;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

final class AdhkaarsRequest
{
    public readonly PaginationOptions $options;

    public function __construct(?PaginationOptions $options = null)
    {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/adhkaars';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
