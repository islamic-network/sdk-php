<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Salaats;

use IslamicNetwork\Pray\DTO\Common\Time;

/** A day link on a prayer detail, with its note and recommended times. */
final class SalaatDetailDay
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var list<Time>|null */
    public readonly ?array $times;

    /**
     * @param array<non-empty-string, string> $name
     * @param list<Time>|null $times
     */
    public function __construct(
        public readonly int $month,
        public readonly int $day,
        public readonly string $slug,
        public readonly string $url,
        array $name,
        public readonly ?string $note = null,
        ?array $times = null,
    ) {
        $this->name = $name;
        $this->times = $times;
    }
}
