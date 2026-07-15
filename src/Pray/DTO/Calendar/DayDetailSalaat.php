<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Calendar;

use IslamicNetwork\Pray\DTO\Common\Time;

/** A prayer as embedded on a day record: summary plus note/times. */
final class DayDetailSalaat
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, list<string>>|null */
    public readonly ?array $highlights;

    /** @var list<Time>|null */
    public readonly ?array $times;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, list<string>>|null $highlights
     * @param list<Time>|null $times
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        array $name,
        ?array $highlights = null,
        public readonly ?string $note = null,
        ?array $times = null,
    ) {
        $this->name = $name;
        $this->highlights = $highlights;
        $this->times = $times;
    }
}
