<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

/** Envelope for GET /calendar/{month}. */
final class CalendarMonthResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly MonthDetail $data,
    ) {
    }
}
