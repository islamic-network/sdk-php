<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaSurahSection
{
    /** @var list<MetaSurahReference> */
    public readonly array $references;

    /**
     * @param list<MetaSurahReference> $references
     */
    public function __construct(
        public readonly int $count,
        array $references,
    ) {
        $this->references = $references;
    }
}
