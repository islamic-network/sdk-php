<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\DTO;

final class SermonLanguage
{
    public function __construct(
        public readonly string $code,
        public readonly string $name,
    ) {
    }
}
