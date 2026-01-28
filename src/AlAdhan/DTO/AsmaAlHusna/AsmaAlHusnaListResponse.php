<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\AsmaAlHusna;

final class AsmaAlHusnaListResponse
{
    /** @var list<AsmaAlHusnaName> */
    public readonly array $data;

    /**
     * @param list<AsmaAlHusnaName> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
