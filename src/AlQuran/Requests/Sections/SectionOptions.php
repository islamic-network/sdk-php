<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Sections;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class SectionOptions
{
    public function __construct(
        public readonly ?int $offset = null,
        public readonly ?int $limit = null,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    /**
     * @return array<string, int>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        return $query;
    }

    /**
     * @return array<string, string>
     */
    public function toHeaders(): array
    {
        if ($this->acceptEncoding === null) {
            return [];
        }

        return ['Accept-Encoding' => $this->acceptEncoding->value];
    }
}
