<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Common;

/** {slug, name, url} — the shared person slug, pointing into the people registry. */
final class PersonRef
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $url,
        array $name,
    ) {
        $this->name = $name;
    }
}
