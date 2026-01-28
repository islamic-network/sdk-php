<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\PrayerTimes;

final class NextPrayerByAddressRequest
{
    public readonly PrayerTimesOptions $options;

    public function __construct(
        public readonly string $date,
        public readonly string $address,
        ?PrayerTimesOptions $options = null,
    ) {
        $this->options = $options ?? new PrayerTimesOptions();
    }

    public function path(): string
    {
        return "/nextPrayerByAddress/{$this->date}";
    }

    /**
     * @return array<string, string|int|bool>
     */
    public function toQuery(): array
    {
        return array_merge(
            ['address' => $this->address],
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
