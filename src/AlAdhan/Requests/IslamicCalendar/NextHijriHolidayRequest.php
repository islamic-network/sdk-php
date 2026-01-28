<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\IslamicCalendar;

final class NextHijriHolidayRequest
{
    public readonly CalendarOptions $options;

    public function __construct(?CalendarOptions $options = null)
    {
        $this->options = $options ?? new CalendarOptions();
    }

    public function path(): string
    {
        return '/nextHijriHoliday';
    }

    /**
     * @return array<string, string|int>
     */
    public function toQuery(): array
    {
        return $this->options->toQuery();
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        return $this->options->toHeaders();
    }
}
