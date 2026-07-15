<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Stories;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /stories. */
final class StoriesResponse
{
    /** @var list<StorySummary> */
    public readonly array $data;

    /**
     * @param list<StorySummary> $data
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
