<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\DTO\Category;

final class Category
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $slug,
    ) {
    }
}
