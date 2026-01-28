<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaSajdaReference
{
    public function __construct(
        public readonly int $surah,
        public readonly int $ayah,
        public readonly bool $recommended,
        public readonly bool $obligatory,
    ) {
    }
}
