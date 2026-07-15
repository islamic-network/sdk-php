<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Calendar;

/** Envelope for GET /calendar/{month}. */
final class CalendarMonthResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly CalendarMonthData $data,
    ) {
    }
}
