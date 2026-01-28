<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Requests\IslamicCalendar;

use IslamicNetwork\AlAdhan\Enums\CalendarMethod;
use IslamicNetwork\AlAdhan\Enums\ContentEncoding;

final class CalendarOptions
{
    public function __construct(
        public readonly ?CalendarMethod $calendarMethod = null,
        public readonly ?int $adjustment = null,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    /**
     * @return array<string, string|int>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->calendarMethod !== null) {
            $query['calendarMethod'] = $this->calendarMethod->value;
        }

        if ($this->adjustment !== null) {
            $query['adjustment'] = $this->adjustment;
        }

        return $query;
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
