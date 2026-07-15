<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\Requests\People;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /people/{slug}/quotes — a person's quotes, paginated. */
final class PersonQuotesRequest
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
        return '/people/' . rawurlencode($this->slug) . '/quotes';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
