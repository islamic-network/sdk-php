<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Events;

use IslamicNetwork\Events\DTO\Common\EventDate;
use IslamicNetwork\Events\DTO\Common\Links;
use IslamicNetwork\Events\DTO\Common\PersonRef;
use IslamicNetwork\Events\DTO\Common\Year;
use IslamicNetwork\Ilm\DTO\Prose;

/** GET /events/{slug} — the full event. */
final class EventDetail
{
    /** @var array<non-empty-string, string> */
    public readonly array $title;

    /** @var array<non-empty-string, Prose>|null */
    public readonly ?array $description;

    /** @var list<PersonRef>|null */
    public readonly ?array $people;

    /**
     * @param array<non-empty-string, string> $title
     * @param array<non-empty-string, Prose>|null $description
     * @param list<PersonRef>|null $people
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $url,
        public readonly EventDate $date,
        array $title,
        public readonly ?Year $year = null,
        ?array $description = null,
        ?array $people = null,
        public readonly ?string $source = null,
        public readonly ?Links $links = null,
        /** Optional, additive enum: observance | birth | passing | historical; unknown values may appear. */
        public readonly ?string $category = null,
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->people = $people;
    }
}
