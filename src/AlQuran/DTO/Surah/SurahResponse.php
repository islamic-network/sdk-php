<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Surah;

final class SurahResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly Surah $data,
    ) {
    }
}
