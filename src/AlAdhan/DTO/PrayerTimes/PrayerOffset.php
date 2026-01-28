<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerOffset
{
    public function __construct(
        public readonly int $Imsak,
        public readonly int $Fajr,
        public readonly int $Sunrise,
        public readonly int $Dhuhr,
        public readonly int $Asr,
        public readonly int $Sunset,
        public readonly int $Maghrib,
        public readonly int $Isha,
        public readonly int $Midnight,
    ) {
    }
}
