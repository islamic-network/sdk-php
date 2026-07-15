<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Common;

/** {number, name} — the month reference on calendar responses. */
final class MonthRef
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly int $number,
        array $name,
    ) {
        $this->name = $name;
    }
}
