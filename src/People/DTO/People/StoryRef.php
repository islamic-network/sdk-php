<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/** A story about the person, linking to the stories API. */
final class StoryRef
{
    /** @var array<non-empty-string, string> */
    public readonly array $title;

    /**
     * @param array<non-empty-string, string> $title
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $published,
        public readonly string $url,
        array $title,
    ) {
        $this->title = $title;
    }
}
