<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\AsmaAlHusna;

final class AsmaAlHusnaName
{
    public function __construct(
        public readonly string $name,
        public readonly string $transliteration,
        public readonly int $number,
        public readonly AsmaAlHusnaTranslation $en,
    ) {
    }
}
