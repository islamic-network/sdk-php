<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\Requests\Calendar;

/** GET /calendar/{month}/{day} — Hijri month and day-of-month numbers. */
final class CalendarDayRequest
{
    public function __construct(
        public readonly int $month,
        public readonly int $day,
    ) {
    }

    public function path(): string
    {
        return '/calendar/' . $this->month . '/' . $this->day;
    }
}
