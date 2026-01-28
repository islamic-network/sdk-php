<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Common;

use IslamicNetwork\AlQuran\DTO\Sajda\SajdaInfo;

final class Ayah
{
    /** @var list<string> */
    public readonly array $audioSecondary;

    /**
     * @param list<string> $audioSecondary
     */
    public function __construct(
        public readonly int $number,
        public readonly string $text,
        public readonly int $numberInSurah,
        public readonly int $juz,
        public readonly int $manzil,
        public readonly int $page,
        public readonly int $ruku,
        public readonly int $hizbQuarter,
        public readonly bool|SajdaInfo $sajda = false,
        public readonly ?SurahReference $surah = null,
        public readonly ?Edition $edition = null,
        public readonly ?string $audio = null,
        array $audioSecondary = [],
    ) {
        $this->audioSecondary = $audioSecondary;
    }
}
