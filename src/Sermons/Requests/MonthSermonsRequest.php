<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\Requests;

final class MonthSermonsRequest
{
    public function __construct(
        public readonly string $source,
        public readonly int $year,
        public readonly int $month,
        public readonly ?SermonType $type = null,
    ) {
    }

    public function path(): string
    {
        $month = str_pad((string) $this->month, 2, '0', STR_PAD_LEFT);
        $base = '/' . rawurlencode($this->source) . '/' . $this->year . '/' . $month;

        if ($this->type === null) {
            return $base . '.json';
        }

        return $base . '/' . $this->type->value . '.json';
    }
}
