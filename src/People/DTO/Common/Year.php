<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\Common;

/** A year pair; either calendar may be absent. Consumers compose lifespans themselves. */
final class Year
{
    public function __construct(
        public readonly ?int $hijri = null,
        public readonly ?int $gregorian = null,
    ) {
    }
}
