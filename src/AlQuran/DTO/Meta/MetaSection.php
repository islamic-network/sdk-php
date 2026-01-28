<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaSection
{
    /** @var list<MetaReference> */
    public readonly array $references;

    /**
     * @param list<MetaReference> $references
     */
    public function __construct(
        public readonly int $count,
        array $references,
    ) {
        $this->references = $references;
    }
}
