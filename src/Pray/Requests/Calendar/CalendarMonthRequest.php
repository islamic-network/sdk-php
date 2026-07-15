<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\Requests\Calendar;

/** GET /calendar/{month} — Hijri month number, 1-12. */
final class CalendarMonthRequest
{
    public function __construct(public readonly int $month)
    {
    }

    public function path(): string
    {
        return '/calendar/' . $this->month;
    }
}
