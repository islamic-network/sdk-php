<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\DTO\IslamicCalendar;

final class SpecialDaysResponse
{
    /** @var list<SpecialDay> */
    public readonly array $data;

    /**
     * @param list<SpecialDay> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
    ) {
        $this->data = $data;
    }
}
