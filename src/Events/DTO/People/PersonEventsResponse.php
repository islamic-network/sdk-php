<?php

declare(strict_types=1);

namespace IslamicNetwork\Events\DTO\People;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /people/{slug}/events. */
final class PersonEventsResponse
{
    public function __construct(
        public readonly int $code,
        public readonly string $status,
        public readonly PersonEventsData $data,
        public readonly ?Meta $meta = null,
    ) {
    }
}
