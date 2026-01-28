<?php

declare(strict_types=1);

namespace IslamicNetwork\Http;

final class BinaryResponse
{
    public function __construct(
        public readonly string $contentType,
        public readonly string $body,
    ) {
    }
}
