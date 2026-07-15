<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Common;

/** An event on a day record; url present when it is a first-class events-API record. */
final class DayEvent
{
    /** @var array<non-empty-string, string> */
    public readonly array $title;

    /**
     * @param array<non-empty-string, string> $title
     */
    public function __construct(
        array $title,
        public readonly ?string $url = null,
    ) {
        $this->title = $title;
    }
}
