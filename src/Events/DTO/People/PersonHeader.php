<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\People;

/** The person block heading /people/{slug}/events. */
final class PersonHeader
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /**
     * @param array<non-empty-string, string> $name
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $registry,
        array $name,
    ) {
        $this->name = $name;
    }
}
