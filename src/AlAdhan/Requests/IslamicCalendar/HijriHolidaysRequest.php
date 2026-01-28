<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\IslamicCalendar;

use IslamicNetwork\AlAdhan\Enums\ContentEncoding;

final class HijriHolidaysRequest
{
    public function __construct(
        public readonly int $day,
        public readonly int $month,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return "/hijriHolidays/{$this->day}/{$this->month}";
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        if ($this->acceptEncoding === null) {
            return [];
        }

        return ['Accept-Encoding' => $this->acceptEncoding->value];
    }
}
