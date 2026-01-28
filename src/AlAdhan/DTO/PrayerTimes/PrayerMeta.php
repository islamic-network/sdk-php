<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerMeta
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $timezone,
        public readonly PrayerMethod $method,
        public readonly string $latitudeAdjustmentMethod,
        public readonly string $midnightMode,
        public readonly string $school,
        public readonly PrayerOffset $offset,
    ) {
    }
}
