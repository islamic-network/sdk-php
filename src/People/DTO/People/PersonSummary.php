<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/** GET /people list entry; also the person block heading the sub-endpoints. */
final class PersonSummary
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
        public readonly string $kind,
        public readonly string $url,
        array $name,
        ?array $honorific = null,
    ) {
        $this->name = $name;
        $this->honorific = $honorific;
    }
}
