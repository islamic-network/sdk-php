<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\Events;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /events. */
final class EventsResponse
{
    /** @var list<EventSummary> */
    public readonly array $data;

    /**
     * @param list<EventSummary> $data
     */
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        array $data,
        public readonly ?Meta $meta = null,
    ) {
        $this->data = $data;
    }
}
