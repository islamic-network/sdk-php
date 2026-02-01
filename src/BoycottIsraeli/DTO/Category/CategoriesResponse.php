<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\DTO\Category;

final class CategoriesResponse
{
    /** @var list<Category> */
    public readonly array $data;

    /**
     * @param list<Category> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
