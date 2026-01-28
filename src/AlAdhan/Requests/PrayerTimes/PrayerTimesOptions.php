<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\PrayerTimes;

use IslamicNetwork\AlAdhan\Enums\CalendarMethod;
use IslamicNetwork\AlAdhan\Enums\ContentEncoding;
use IslamicNetwork\AlAdhan\Enums\LatitudeAdjustmentMethod;
use IslamicNetwork\AlAdhan\Enums\PrayerCalculationMethod;
use IslamicNetwork\AlAdhan\Enums\PrayerMidnightMode;
use IslamicNetwork\AlAdhan\Enums\PrayerSchool;
use IslamicNetwork\AlAdhan\Enums\PrayerShafaq;

final class PrayerTimesOptions
{
    public function __construct(
        public readonly ?PrayerCalculationMethod $method = null,
        public readonly ?PrayerShafaq $shafaq = null,
        public readonly ?PrayerTimesTune $tune = null,
        public readonly ?PrayerSchool $school = null,
        public readonly ?PrayerMidnightMode $midnightMode = null,
        public readonly ?string $timeZone = null,
        public readonly ?LatitudeAdjustmentMethod $latitudeAdjustmentMethod = null,
        public readonly ?CalendarMethod $calendarMethod = null,
        public readonly ?int $adjustment = null,
        public readonly ?bool $iso8601 = null,
        public readonly ?bool $annual = null,
        public readonly ?string $x7xApiKey = null,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    /**
     * @return array<string, string|int|bool>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->method !== null) {
            $query['method'] = $this->method->value;
        }

        if ($this->shafaq !== null) {
            $query['shafaq'] = $this->shafaq->value;
        }

        if ($this->tune !== null) {
            $query['tune'] = $this->tune->toString();
        }

        if ($this->school !== null) {
            $query['school'] = $this->school->value;
        }

        if ($this->midnightMode !== null) {
            $query['midnightMode'] = $this->midnightMode->value;
        }

        if ($this->timeZone !== null) {
            $query['timezonestring'] = $this->timeZone;
        }

        if ($this->latitudeAdjustmentMethod !== null) {
            $query['latitudeAdjustmentMethod'] = $this->latitudeAdjustmentMethod->value;
        }

        if ($this->calendarMethod !== null) {
            $query['calendarMethod'] = $this->calendarMethod->value;
        }

        if ($this->adjustment !== null) {
            $query['adjustment'] = $this->adjustment;
        }

        if ($this->iso8601 !== null) {
            $query['iso8601'] = $this->iso8601;
        }

        if ($this->annual !== null) {
            $query['annual'] = $this->annual;
        }

        if ($this->x7xApiKey !== null) {
            $query['x7xapikey'] = $this->x7xApiKey;
        }

        return $query;
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        if ($this->acceptEncoding === null) {
            return [];
        }

        return ['Accept-Encoding' => $this->acceptEncoding->value];
    }
}
