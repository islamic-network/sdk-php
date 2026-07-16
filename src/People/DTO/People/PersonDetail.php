<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

use IslamicNetwork\Ilm\DTO\Prose;
use IslamicNetwork\People\DTO\Common\Image;
use IslamicNetwork\People\DTO\Common\Year;

/** GET /people/{slug} — biography plus what the ecosystem knows about the person. */
final class PersonDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $honorific;

    /** @var array<non-empty-string, string>|null The honoured byname. */
    public readonly ?array $epithet;

    /** @var array<non-empty-string, string>|null Where the person is known by. */
    public readonly ?array $place;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $biography;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, string>|null $honorific
     * @param array<non-empty-string, string>|null $epithet
     * @param array<non-empty-string, string>|null $place
     * @param array<non-empty-string, Prose>|null $biography
     * @param list<RelatedRef>|null $related studio-curated person links, omitted when empty
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        public readonly string $kind,
        array $name,
        ?array $honorific = null,
        ?array $epithet = null,
        ?array $place = null,
        public readonly ?Image $image = null,
        public readonly ?Year $birth = null,
        public readonly ?Year $death = null,
        ?array $biography = null,
        public readonly ?EventsAggregation $events = null,
        public readonly ?QuotesAggregation $quotes = null,
        public readonly ?StoriesAggregation $stories = null,
        public readonly ?array $related = null,
    ) {
        $this->name = $name;
        $this->honorific = $honorific;
        $this->epithet = $epithet;
        $this->place = $place;
        $this->biography = $biography;
    }
}
