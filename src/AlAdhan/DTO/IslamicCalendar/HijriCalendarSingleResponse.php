<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

final class HijriCalendarSingleResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly HijriCalendarDate $data,
    ) {
    }
}
