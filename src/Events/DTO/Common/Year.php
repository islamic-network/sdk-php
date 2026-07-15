<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Common;

/** When the event actually happened; either calendar may be absent. */
final class Year
{
    public function __construct(
        public readonly ?int $hijri = null,
        public readonly ?int $gregorian = null,
    ) {
    }
}
