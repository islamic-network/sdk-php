<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\PrayerTimes;

final class HijriCalendarByCoordinatesYearRequest
{
    public readonly PrayerTimesOptions $options;

    public function __construct(
        public readonly int $year,
        public readonly float $latitude,
        public readonly float $longitude,
        ?PrayerTimesOptions $options = null,
    ) {
        $this->options = $options ?? new PrayerTimesOptions();
    }

    public function path(): string
    {
        return "/hijriCalendar/{$this->year}";
    }

    /**
     * @return array<string, string|int|bool|float>
     */
    public function toQuery(): array
    {
        return array_merge(
            [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            $this->options->toQuery(),
        );
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        return $this->options->toHeaders();
    }
}
