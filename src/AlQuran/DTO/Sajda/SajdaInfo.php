<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Sajda;

final class SajdaInfo
{
    public function __construct(
        public readonly int $id,
        public readonly bool $recommended,
        public readonly bool $obligatory,
    ) {
    }
}
