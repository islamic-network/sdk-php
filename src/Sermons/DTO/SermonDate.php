<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\DTO;

final class SermonDate
{
    public function __construct(
        public readonly string $iso8601,
        public readonly SermonDatePart $month,
        public readonly SermonDatePart $day,
        public readonly string $year,
    ) {
    }
}
