<?php

declare(strict_types=1);

namespace IslamicNetwork\People\DTO\People;

use IslamicNetwork\Ilm\DTO\Prose;
use IslamicNetwork\People\DTO\Common\Year;

/** GET /people/{slug} — biography plus what the ecosystem knows about the person. */
final class PersonDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $name;

    /** @var array<non-empty-string, string>|null */
    public readonly ?array $honorific;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $biography;

    /**
     * @param array<non-empty-string, string> $name
     * @param array<non-empty-string, string>|null $honorific
     * @param array<non-empty-string, Prose>|null $biography
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        public readonly string $kind,
        array $name,
        ?array $honorific = null,
        public readonly ?Year $birth = null,
        public readonly ?Year $death = null,
        ?array $biography = null,
        public readonly ?EventsAggregation $events = null,
        public readonly ?QuotesAggregation $quotes = null,
        public readonly ?StoriesAggregation $stories = null,
    ) {
        $this->name = $name;
        $this->honorific = $honorific;
        $this->biography = $biography;
    }
}
