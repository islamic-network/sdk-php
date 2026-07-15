<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\Requests\Calendar;

/** GET /calendar/today — optional Gregorian date as DD-MM-YYYY (defaults to the server date). */
final class CalendarTodayRequest
{
    public function __construct(public readonly ?string $date = null)
    {
    }

    public function path(): string
    {
        return '/calendar/today';
    }

    /**
     * @return array<string, string>
     */
    public function toQuery(): array
    {
        return $this->date !== null ? ['date' => $this->date] : [];
    }
}
