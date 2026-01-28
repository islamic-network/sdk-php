<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Surah;

final class SurahEditionsResponse
{
    /** @var list<Surah> */
    public readonly array $data;

    /**
     * @param list<Surah> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
