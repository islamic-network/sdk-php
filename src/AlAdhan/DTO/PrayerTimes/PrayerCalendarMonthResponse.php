<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerCalendarMonthResponse
{
    /** @var list<PrayerCalendarEntry> */
    public readonly array $data;

    /**
     * @param list<PrayerCalendarEntry> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
