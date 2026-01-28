<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaSurahReference
{
    public function __construct(
        public readonly int $number,
        public readonly string $name,
        public readonly string $englishName,
        public readonly string $englishNameTranslation,
        public readonly int $numberOfAyahs,
        public readonly string $revelationType,
    ) {
    }
}
