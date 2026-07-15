<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Events;

use IslamicNetwork\Events\DTO\Common\EventDate;
use IslamicNetwork\Events\DTO\Common\Year;

/** GET /events list entry; also `next` on /calendar/today and the person-events items. */
final class EventSummary
{
    /** @var array<non-empty-string, string> */
    public readonly array $title;

    /**
     * @param array<non-empty-string, string> $title
     */
    public function __construct(
        public readonly string $slug,
        public readonly EventDate $date,
        public readonly string $url,
        array $title,
        public readonly ?Year $year = null,
    ) {
        $this->title = $title;
    }
}
