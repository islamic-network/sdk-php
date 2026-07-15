<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories\DTO\Tags;

use IslamicNetwork\Ilm\DTO\Meta;

/** Envelope for GET /tags. */
final class TagsResponse
{
    /** @var list<Tag> */
    public readonly array $data;

    /**
     * @param list<Tag> $data
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
