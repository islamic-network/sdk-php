<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Stories;

use IslamicNetwork\Ilm\DTO\Prose;
use IslamicNetwork\Stories\DTO\Common\Image;
use IslamicNetwork\Stories\DTO\Common\PersonRef;

/** GET /stories/{slug} — the full story with its body. */
final class StoryDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $title;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $description;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $body;

    /** @var list<string>|null shared-taxonomy topic slugs */
    public readonly ?array $tags;

    /** @var list<PersonRef>|null */
    public readonly ?array $people;

    /**
     * @param array<non-empty-string, string> $title
     * @param array<non-empty-string, string>|null $description
     * @param array<non-empty-string, Prose>|null $body
     * @param list<string>|null $tags
     * @param list<PersonRef>|null $people
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $url,
        public readonly string $published,
        array $title,
        ?array $description = null,
        ?array $body = null,
        public readonly ?Image $image = null,
        ?array $tags = null,
        public readonly ?string $source = null,
        ?array $people = null,
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->body = $body;
        $this->tags = $tags;
        $this->people = $people;
    }
}
