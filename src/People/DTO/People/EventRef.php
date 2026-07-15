<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

use IslamicNetwork\People\DTO\Common\EventDate;
use IslamicNetwork\People\DTO\Common\Year;

/** An event involving the person — the events API's summary shape. */
final class EventRef
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
