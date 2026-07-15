<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Common;

/** When a prayer is recommended; apps key icons off the stable key. */
final class Time
{
    public function __construct(
        public readonly string $key,
        public readonly string $label,
    ) {
    }
}
