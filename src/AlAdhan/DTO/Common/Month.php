<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Common;

final class Month
{
    public function __construct(
        public readonly int $number,
        public readonly string $en,
        public readonly ?string $ar = null,
        public readonly ?int $days = null,
    ) {
    }
}
