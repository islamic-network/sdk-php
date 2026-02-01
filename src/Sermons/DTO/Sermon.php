<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\DTO;

final class Sermon
{
    /** @var list<SermonEdition> */
    public readonly array $editions;

    /**
     * @param list<SermonEdition> $editions
     */
    public function __construct(
        public readonly string $title,
        public readonly SermonDate $date,
        public readonly string $type,
        public readonly string $source,
        array $editions = [],
    ) {
        $this->editions = $editions;
    }
}
