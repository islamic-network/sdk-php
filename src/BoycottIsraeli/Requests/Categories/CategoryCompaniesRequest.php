<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\Requests\Categories;

use IslamicNetwork\BoycottIsraeli\Requests\PaginationOptions;

final class CategoryCompaniesRequest
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
        return '/categories/' . rawurlencode($this->slug) . '/companies';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
