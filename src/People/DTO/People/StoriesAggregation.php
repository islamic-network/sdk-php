<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

/** What the stories domain knows about a person: count, preview (up to 3), filtered-list URL. */
final class StoriesAggregation
{
    /** @var list<StoryRef> */
    public readonly array $preview;

    /**
     * @param list<StoryRef> $preview
     */
    public function __construct(
        public readonly int $total,
        public readonly string $url,
        array $preview = [],
    ) {
        $this->preview = $preview;
    }
}
