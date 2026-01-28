<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Common;

final class StringListResponse
{
    /** @var list<string> */
    public readonly array $data;

    /**
     * @param list<string> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
