<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Common;

final class SurahReference
{
    public function __construct(
        public readonly int $number,
        public readonly string $name,
        public readonly string $englishName,
        public readonly ?string $englishNameTranslation = null,
        public readonly string $revelationType = 'Meccan',
        public readonly ?int $numberOfAyahs = null,
    ) {
    }
}
