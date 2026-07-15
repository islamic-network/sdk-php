<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Calendar;

use IslamicNetwork\Events\DTO\Common\MonthRef;

/** GET /calendar/{month} — the month's observed events, each with its date. */
final class CalendarMonthData
{
    /** @var list<CalendarEvent> */
    public readonly array $events;

    /**
     * @param list<CalendarEvent> $events
     */
    public function __construct(
        public readonly MonthRef $month,
        array $events = [],
    ) {
        $this->events = $events;
    }
}
