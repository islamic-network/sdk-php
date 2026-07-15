<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\Requests\Tags;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /tags — the topic slugs used by stories, with names and counts, slug order. */
final class TagsRequest
{
    public readonly PaginationOptions $options;

    public function __construct(?PaginationOptions $options = null)
    {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/tags';
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }
}
