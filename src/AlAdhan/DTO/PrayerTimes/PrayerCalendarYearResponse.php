<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

final class PrayerCalendarYearResponse
{
    /** @var array<string, list<PrayerCalendarEntry>> */
    public readonly array $data;

    /**
     * @param array<string, list<PrayerCalendarEntry>> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }

    /**
     * @return array<int, list<PrayerCalendarEntry>>
     */
    public function months(): array
    {
        $months = [];
        foreach ($this->data as $key => $entries) {
            $months[(int) $key] = $entries;
        }

        return $months;
    }
}
