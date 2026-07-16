<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

use IslamicNetwork\People\DTO\Common\Image;

/** GET /people list entry; also the person block heading the sub-endpoints. */
final class PersonSummary
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $honorific;

    /** @var array<non-empty-string, string>|null The honoured byname. */
    public readonly ?array $epithet;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, string>|null $honorific
     * @param array<non-empty-string, string>|null $epithet
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $kind,
        public readonly string $url,
        array $name,
        ?array $honorific = null,
        ?array $epithet = null,
        public readonly ?Image $image = null,
        public readonly ?Traces $traces = null,
    ) {
        $this->name = $name;
        $this->honorific = $honorific;
        $this->epithet = $epithet;
    }
}
