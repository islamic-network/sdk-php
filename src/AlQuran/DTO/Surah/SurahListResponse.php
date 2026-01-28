<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Surah;

use IslamicNetwork\AlQuran\DTO\Common\SurahReference;

final class SurahListResponse
{
    /** @var list<SurahReference> */
    public readonly array $data;

    /**
     * @param list<SurahReference> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
