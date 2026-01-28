<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaReference
{
    public function __construct(
        public readonly int $surah,
        public readonly int $ayah,
    ) {
    }
}
