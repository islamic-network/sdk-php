<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Recitations;

/** Full recitation entry as embedded in day details (no day links). */
final class RecitationEmbedded
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $translations;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, string>|null $translations
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        public readonly string $formula,
        array $name,
        ?array $translations = null,
        public readonly ?string $source = null,
    ) {
        $this->name = $name;
        $this->translations = $translations;
    }
}
