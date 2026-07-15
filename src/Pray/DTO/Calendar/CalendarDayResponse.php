<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

/** Envelope for GET /calendar/{month}/{day}. */
final class CalendarDayResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly DayDetail $data,
    ) {
    }
}
