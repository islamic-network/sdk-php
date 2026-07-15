<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Common;

/** Minimal month reference: {number, name}. */
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
