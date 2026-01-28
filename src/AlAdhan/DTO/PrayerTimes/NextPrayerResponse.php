<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class NextPrayerResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly NextPrayerData $data,
    ) {
    }
}
