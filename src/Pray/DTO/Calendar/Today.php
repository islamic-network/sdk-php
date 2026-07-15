<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

use IslamicNetwork\Pray\DTO\Common\MonthSummary;

/** GET /calendar/today — month/day/next are contractually present even when null. */
final class Today
{
    public function __construct(
        public readonly TodayDate $date,
        public readonly ?MonthSummary $month = null,
        public readonly ?DayDetail $day = null,
        public readonly ?NextDay $next = null,
    ) {
    }
}
