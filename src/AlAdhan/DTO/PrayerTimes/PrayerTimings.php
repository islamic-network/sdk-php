<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerTimings
{
    public function __construct(
        public readonly string $Fajr,
        public readonly string $Sunrise,
        public readonly string $Dhuhr,
        public readonly string $Asr,
        public readonly string $Sunset,
        public readonly string $Maghrib,
        public readonly string $Isha,
        public readonly string $Imsak,
        public readonly string $Midnight,
        public readonly string $Firstthird,
        public readonly string $Lastthird,
    ) {
    }
}
