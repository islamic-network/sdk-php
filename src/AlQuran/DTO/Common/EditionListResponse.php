<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Common;

final class EditionListResponse
{
    /** @var list<Edition> */
    public readonly array $data;

    /**
     * @param list<Edition> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
