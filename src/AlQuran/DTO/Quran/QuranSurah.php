<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Quran;

use IslamicNetwork\AlQuran\DTO\Common\Ayah;

final class QuranSurah
{
    /** @var list<Ayah> */
    public readonly array $ayahs;

    /**
     * @param list<Ayah> $ayahs
     */
    public function __construct(
        public readonly int $number,
        public readonly string $name,
        public readonly string $englishName,
        public readonly ?string $englishNameTranslation = null,
        public readonly string $revelationType = 'Meccan',
        public readonly ?int $numberOfAyahs = null,
        array $ayahs = [],
        public readonly ?Ayah $preBismillah = null,
    ) {
        $this->ayahs = $ayahs;
    }
}
