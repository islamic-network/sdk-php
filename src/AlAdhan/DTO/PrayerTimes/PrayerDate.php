<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\PrayerTimes;

use IslamicNetwork\AlAdhan\DTO\Common\GregorianDate;
use IslamicNetwork\AlAdhan\DTO\Common\HijriDate;

final class PrayerDate
{
    public function __construct(
        public readonly string $readable,
        public readonly string $timestamp,
        public readonly HijriDate $hijri,
        public readonly GregorianDate $gregorian,
    ) {
    }
}
