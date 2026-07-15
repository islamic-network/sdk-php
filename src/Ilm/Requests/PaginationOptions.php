<?php

declare(strict_types=1);

namespace IslamicNetwork\Ilm\Requests;

/** `?page` (default 1) / `?limit` (default 50, max 200) on ilm list endpoints. */
final class PaginationOptions
{
    public function __construct(
        public readonly ?int $page = null,
        public readonly ?int $limit = null,
    ) {
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->page !== null) {
            $query['page'] = $this->page;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        return $query;
    }
}
