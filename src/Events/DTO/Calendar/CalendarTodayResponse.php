<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Calendar;

/** Envelope for GET /calendar/today. */
final class CalendarTodayResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly Today $data,
    ) {
    }
}
