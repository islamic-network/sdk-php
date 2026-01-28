<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Search;

use IslamicNetwork\AlQuran\DTO\Common\SurahReference;
use IslamicNetwork\AlQuran\DTO\Sajda\SajdaInfo;

final class SearchMatch
{
    public function __construct(
        public readonly int $number,
        public readonly string $text,
        public readonly SearchEdition $edition,
        public readonly SurahReference $surah,
        public readonly int $numberInSurah,
        public readonly ?int $juz = null,
        public readonly ?int $manzil = null,
        public readonly ?int $page = null,
        public readonly ?int $ruku = null,
        public readonly ?int $hizbQuarter = null,
        public readonly bool|SajdaInfo $sajda = false,
    ) {
    }
}
