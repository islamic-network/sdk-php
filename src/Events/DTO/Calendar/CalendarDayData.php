<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Calendar;

use IslamicNetwork\Events\DTO\Common\EventDate;
use IslamicNetwork\Events\DTO\Common\Links;
use IslamicNetwork\Events\DTO\Common\MonthRef;

/** GET /calendar/{month}/{day} — the events observed on a Hijri day. */
final class CalendarDayData
{
    /** @var list<CalendarEvent> */
    public readonly array $events;

    /**
     * @param list<CalendarEvent> $events
     */
    public function __construct(
        public readonly EventDate $date,
        public readonly MonthRef $month,
        array $events = [],
        public readonly ?Links $links = null,
    ) {
        $this->events = $events;
    }
}
