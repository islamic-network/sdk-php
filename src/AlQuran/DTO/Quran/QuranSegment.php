<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Quran;

use IslamicNetwork\AlQuran\DTO\Common\Ayah;
use IslamicNetwork\AlQuran\DTO\Common\Edition;
use IslamicNetwork\AlQuran\DTO\Common\SurahReference;

final class QuranSegment
{
    /** @var list<Ayah> */
    public readonly array $ayahs;

    /** @var array<string, SurahReference> */
    public readonly array $surahs;

    /**
     * @param list<Ayah> $ayahs
     * @param array<string, SurahReference> $surahs
     */
    public function __construct(
        public readonly int $number,
        array $ayahs,
        array $surahs,
        public readonly ?Edition $edition = null,
    ) {
        $this->ayahs = $ayahs;
        $this->surahs = $surahs;
    }

    /**
     * @return array<int, SurahReference>
     */
    public function surahMap(): array
    {
        $map = [];
        foreach ($this->surahs as $key => $value) {
            $map[(int) $key] = $value;
        }

        return $map;
    }
}
