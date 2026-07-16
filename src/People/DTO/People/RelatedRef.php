<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/**
 * A studio-curated link to another registry person — teacher, student, kin,
 * line. Directional as stored; the note is a plain-English relation
 * ("his shaykh", "his cousin"), omitted when blank.
 */
final class RelatedRef
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
        public readonly ?string $note = null,
    ) {
        $this->name = $name;
        $this->honorific = $honorific;
    }
}
