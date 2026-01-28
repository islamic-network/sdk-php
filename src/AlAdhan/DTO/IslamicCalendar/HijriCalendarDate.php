<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

use IslamicNetwork\AlAdhan\DTO\Common\GregorianDate;
use IslamicNetwork\AlAdhan\DTO\Common\HijriDate;

final class HijriCalendarDate
{
    public function __construct(
        public readonly HijriDate $hijri,
        public readonly GregorianDate $gregorian,
    ) {
    }
}
