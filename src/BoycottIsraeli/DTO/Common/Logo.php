<?php

declare(strict_types=1);

namespace IslamicNetwork\BoycottIsraeli\DTO\Common;

final class Logo
{
    public function __construct(
        public readonly ?string $type = null,
        public readonly ?string $url = null,
    ) {
    }
}
