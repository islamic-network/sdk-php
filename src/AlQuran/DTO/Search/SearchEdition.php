<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Search;

final class SearchEdition
{
    public function __construct(
        public readonly string $identifier,
        public readonly string $language,
        public readonly string $name,
        public readonly string $englishName,
        public readonly string $type,
    ) {
    }
}
