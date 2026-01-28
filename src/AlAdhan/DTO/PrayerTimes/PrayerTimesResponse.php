<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerTimesResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly PrayerTimesData $data,
    ) {
    }
}
