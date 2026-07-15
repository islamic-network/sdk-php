<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Calendar;

use IslamicNetwork\Events\DTO\Common\HijriDate;

/** The resolved date pair on /calendar/today. */
final class TodayDate
{
    public function __construct(
        public readonly string $gregorian,
        public readonly HijriDate $hijri,
    ) {
    }
}
