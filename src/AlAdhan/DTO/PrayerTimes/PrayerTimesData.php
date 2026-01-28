<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerTimesData
{
    public function __construct(
        public readonly PrayerTimings $timings,
        public readonly PrayerDate $date,
        public readonly PrayerMeta $meta,
    ) {
    }
}
