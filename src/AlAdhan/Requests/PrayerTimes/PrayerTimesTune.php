<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\PrayerTimes;

final class PrayerTimesTune
{
    public function __construct(
        public readonly int $imsak,
        public readonly int $fajr,
        public readonly int $sunrise,
        public readonly int $dhuhr,
        public readonly int $asr,
        public readonly int $maghrib,
        public readonly int $sunset,
        public readonly int $isha,
        public readonly int $midnight,
    ) {
    }

    public function toString(): string
    {
        return implode(',', [
            $this->imsak,
            $this->fajr,
            $this->sunrise,
            $this->dhuhr,
            $this->asr,
            $this->maghrib,
            $this->sunset,
            $this->isha,
            $this->midnight,
        ]);
    }
}
