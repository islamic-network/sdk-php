<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\Requests;

final class YearSermonsRequest
{
    public function __construct(
        public readonly string $source,
        public readonly int $year,
        public readonly ?SermonType $type = null,
    ) {
    }

    public function path(): string
    {
        $base = '/' . rawurlencode($this->source) . '/' . $this->year;

        if ($this->type === null) {
            return $base . '.json';
        }

        return $base . '/' . $this->type->value . '.json';
    }
}
