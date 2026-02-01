<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\Requests\Companies;

use IslamicNetwork\BoycottIsraeli\Requests\PaginationOptions;

final class CompaniesRequest
{
    public readonly PaginationOptions $options;

    public function __construct(?PaginationOptions $options = null)
    {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/companies';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
