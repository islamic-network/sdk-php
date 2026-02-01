<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\DTO;

final class SermonDatePart
{
    public function __construct(
        public readonly string $name,
        public readonly string $shortname,
        public readonly string $number,
    ) {
    }
}
