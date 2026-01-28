<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Surah;

use IslamicNetwork\AlQuran\DTO\Common\Ayah;
use IslamicNetwork\AlQuran\DTO\Common\Edition;

final class Surah
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
        public readonly Edition $edition,
        public readonly ?string $englishNameTranslation = null,
        public readonly string $revelationType = 'Meccan',
        public readonly int $numberOfAyahs = 0,
        array $ayahs = [],
        public readonly ?Ayah $preBismillah = null,
    ) {
        $this->ayahs = $ayahs;
    }
}
