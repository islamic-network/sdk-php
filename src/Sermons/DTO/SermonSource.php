<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\DTO;

final class SermonSource
{
    /** @var list<int> */
    public readonly array $years;

    /**
     * @param list<int> $years
     */
    public function __construct(
        public readonly string $name,
        public readonly string $handle,
        array $years = [],
    ) {
        $this->years = $years;
    }
}
