<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Calendar;

use IslamicNetwork\Events\DTO\Common\Links;
use IslamicNetwork\Events\DTO\Common\MonthRef;
use IslamicNetwork\Events\DTO\Events\EventSummary;

/**
 * GET /calendar/today — month and next are contractually present even when
 * null; links only when pray has a record for the resolved day.
 */
final class Today
{
    /** @var list<CalendarEvent> */
    public readonly array $events;

    /**
     * @param list<CalendarEvent> $events
     */
    public function __construct(
        public readonly TodayDate $date,
        public readonly ?MonthRef $month = null,
        array $events = [],
        public readonly ?Links $links = null,
        public readonly ?EventSummary $next = null,
    ) {
        $this->events = $events;
    }
}
