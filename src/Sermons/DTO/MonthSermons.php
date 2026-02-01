<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\DTO;

final class MonthSermons
{
    /** @var list<Sermon> */
    public readonly array $sermons;

    /**
     * @param list<Sermon> $sermons
     */
    public function __construct(
        array $sermons,
        public readonly SermonDatePart $month,
    ) {
        $this->sermons = $sermons;
    }
}
