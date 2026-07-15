<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\Requests\Stories;

use IslamicNetwork\Ilm\Requests\PaginationOptions;

/** GET /stories — paginated summaries, newest first. Filters: `?tag=<tag>`, `?person=<slug>`. */
final class StoriesRequest
{
    public readonly PaginationOptions $options;

    public function __construct(
        public readonly ?string $tag = null,
        public readonly ?string $person = null,
        ?PaginationOptions $options = null,
    ) {
        $this->options = $options ?? new PaginationOptions();
    }

    public function path(): string
    {
        return '/stories';
    }

    /**
     * @return array<string, int|string>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->tag !== null) {
            $query['tag'] = $this->tag;
        }

        if ($this->person !== null) {
            $query['person'] = $this->person;
        }

        return array_merge($query, $this->options->toQuery());
    }
}
