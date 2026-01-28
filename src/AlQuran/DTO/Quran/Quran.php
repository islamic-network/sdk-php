<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Quran;

use IslamicNetwork\AlQuran\DTO\Common\Edition;

final class Quran
{
    /** @var list<QuranSurah> */
    public readonly array $surahs;

    /**
     * @param list<QuranSurah> $surahs
     */
    public function __construct(
        array $surahs,
        public readonly Edition $edition,
    ) {
        $this->surahs = $surahs;
    }
}
