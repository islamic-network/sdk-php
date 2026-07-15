<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\People;

/** The person block heading /people/{slug}/quotes; registry is the canonical record. */
final class PersonBlock
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $honorific;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, string>|null $honorific
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $registry,
        array $name,
        ?array $honorific = null,
        public readonly ?string $kind = null,
    ) {
        $this->name = $name;
        $this->honorific = $honorific;
    }
}
