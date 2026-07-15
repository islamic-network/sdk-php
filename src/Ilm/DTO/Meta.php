<?php

declare(strict_types=1);

namespace IslamicNetwork\Ilm\DTO;

/** Pagination sibling on list endpoints: {total, page, limit, pages}. */
final class Meta
{
    public function __construct(
        public readonly int $total,
        public readonly int $page,
        public readonly int $limit,
        public readonly int $pages,
    ) {
    }
}
