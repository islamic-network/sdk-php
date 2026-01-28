<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class NextPrayerData
{
    /** @var array<string, string> */
    public readonly array $timings;

    /**
     * @param array<string, string> $timings
     */
    public function __construct(
        array $timings,
        public readonly PrayerDate $date,
        public readonly PrayerMeta $meta,
    ) {
        $this->timings = $timings;
    }
}
