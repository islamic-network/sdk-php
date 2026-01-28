<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Sajda;

use IslamicNetwork\AlQuran\DTO\Common\SurahReference;

final class SajdaAyah
{
    public function __construct(
        public readonly int $number,
        public readonly string $text,
        public readonly SurahReference $surah,
        public readonly int $numberInSurah,
        public readonly int $juz,
        public readonly int $manzil,
        public readonly int $page,
        public readonly int $ruku,
        public readonly int $hizbQuarter,
        public readonly SajdaInfo $sajda,
    ) {
    }
}
