<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Common;

final class Weekday
{
    public function __construct(
        public readonly string $en,
        public readonly ?string $ar = null,
    ) {
    }
}
