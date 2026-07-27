<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Recitations;

/** A month link on a recitation detail, with its note. */
final class RecitationDetailMonth
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @param array<non-empty-string, string> $name */
    public function __construct(
        public readonly int $number,
        public readonly string $url,
        array $name,
        public readonly ?string $note = null,
    ) {
        $this->name = $name;
    }
}
