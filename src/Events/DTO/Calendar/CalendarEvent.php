<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Calendar;

use IslamicNetwork\Events\DTO\Common\EventDate;
use IslamicNetwork\Events\DTO\Common\PersonRef;
use IslamicNetwork\Events\DTO\Common\Year;

/**
 * An event as listed on the calendar endpoints: year/people when present.
 * The day view omits `date` (it is the path); the month view carries it.
 */
final class CalendarEvent
{
    /** @var array<non-empty-string, string> */
    public readonly array $title;

    /** @var list<PersonRef>|null */
    public readonly ?array $people;

    /**
     * @param array<non-empty-string, string> $title
     * @param list<PersonRef>|null $people
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $url,
        array $title,
        public readonly ?EventDate $date = null,
        public readonly ?Year $year = null,
        ?array $people = null,
        /** Optional, additive enum: observance | birth | passing | historical; unknown values may appear. */
        public readonly ?string $category = null,
    ) {
        $this->title = $title;
        $this->people = $people;
    }
}
