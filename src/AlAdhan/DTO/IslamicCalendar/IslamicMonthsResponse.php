<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

final class IslamicMonthsResponse
{
    /** @var array<string, IslamicMonth> */
    public readonly array $data;

    /**
     * @param array<string, IslamicMonth> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }

    /**
     * @return array<int, IslamicMonth>
     */
    public function months(): array
    {
        $months = [];
        foreach ($this->data as $key => $value) {
            $months[(int) $key] = $value;
        }

        return $months;
    }
}
