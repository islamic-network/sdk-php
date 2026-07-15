<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Common;

final class HijriDate
{
    public function __construct(
        public readonly int $year,
        public readonly int $month,
        public readonly int $day,
    ) {
    }
}
