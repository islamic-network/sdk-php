<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray\DTO\Recitations;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /salawaats, /adhkaars and /duas (one shape, three collections). */
final class RecitationsResponse
{
    /** @var list<RecitationSummary> */
    public readonly array $data;

    /**
     * @param list<RecitationSummary> $data
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
