<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\DTO;

final class SermonEdition
{
    public function __construct(
        public readonly string $language,
        public readonly string $format,
        public readonly string $url,
    ) {
    }
}
