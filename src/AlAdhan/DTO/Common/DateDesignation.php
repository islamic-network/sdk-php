<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\Common;

final class DateDesignation
{
    public function __construct(
        public readonly string $abbreviated,
        public readonly string $expanded,
    ) {
    }
}
