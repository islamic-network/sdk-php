<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaCount
{
    public function __construct(
        public readonly int $count,
    ) {
    }
}
