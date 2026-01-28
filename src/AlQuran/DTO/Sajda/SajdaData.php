<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Sajda;

use IslamicNetwork\AlQuran\DTO\Common\Edition;

final class SajdaData
{
    /** @var list<SajdaAyah> */
    public readonly array $ayahs;

    /**
     * @param list<SajdaAyah> $ayahs
     */
    public function __construct(
        array $ayahs,
        public readonly Edition $edition,
    ) {
        $this->ayahs = $ayahs;
    }
}
