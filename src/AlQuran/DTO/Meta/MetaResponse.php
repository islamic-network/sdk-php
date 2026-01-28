<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly MetaData $data,
    ) {
    }
}
