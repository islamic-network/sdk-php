<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\Requests;

final class PaginationOptions
{
    public function __construct(
        public readonly ?int $limit = null,
        public readonly ?int $offset = null,
    ) {
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }
}
