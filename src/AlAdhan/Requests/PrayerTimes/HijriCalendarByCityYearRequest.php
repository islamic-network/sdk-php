<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\PrayerTimes;

final class HijriCalendarByCityYearRequest
{
    public readonly PrayerTimesOptions $options;

    public function __construct(
        public readonly int $year,
        public readonly string $city,
        public readonly string $country,
        public readonly ?string $state = null,
        ?PrayerTimesOptions $options = null,
    ) {
        $this->options = $options ?? new PrayerTimesOptions();
    }

    public function path(): string
    {
        return "/hijriCalendarByCity/{$this->year}";
    }

    /**
     * @return array<string, string|int|bool>
     */
    public function toQuery(): array
    {
        $query = [
            'city' => $this->city,
            'country' => $this->country,
        ];

        if ($this->state !== null) {
            $query['state'] = $this->state;
        }

        return array_merge($query, $this->options->toQuery());
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        return $this->options->toHeaders();
    }
}
