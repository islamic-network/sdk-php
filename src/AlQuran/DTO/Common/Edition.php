<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Common;

final class Edition
{
    public function __construct(
        public readonly string $identifier,
        public readonly string $language,
        public readonly string $name,
        public readonly string $englishName,
        public readonly ?string $format = null,
        public readonly string $type = 'quran',
        public readonly ?string $direction = null,
    ) {
    }
}
