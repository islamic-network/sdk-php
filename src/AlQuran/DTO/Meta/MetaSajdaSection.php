<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaSajdaSection
{
    /** @var list<MetaSajdaReference> */
    public readonly array $references;

    /**
     * @param list<MetaSajdaReference> $references
     */
    public function __construct(
        public readonly int $count,
        array $references,
    ) {
        $this->references = $references;
    }
}
