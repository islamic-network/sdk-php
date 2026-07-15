<?php

declare(strict_types=1);

namespace IslamicNetwork\Quotes\DTO\Quotes;

/** The embedded person summary; url points into the people registry. */
final class Author
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
        public readonly string $url,
        array $name,
        ?array $honorific = null,
        public readonly ?string $kind = null,
    ) {
        $this->name = $name;
        $this->honorific = $honorific;
    }
}
