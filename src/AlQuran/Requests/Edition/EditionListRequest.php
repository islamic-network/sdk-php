<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Edition;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;

final class EditionListRequest
{
    public function __construct(
        public readonly ?string $type = null,
        public readonly ?string $format = null,
        public readonly ?string $language = null,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
    }

    public function path(): string
    {
        return '/edition';
    }

    /**
     * @return array<string, string>
     */
    public function toQuery(): array
    {
        $query = [];

        if ($this->type !== null) {
            $query['type'] = $this->type;
        }

        if ($this->format !== null) {
            $query['format'] = $this->format;
        }

        if ($this->language !== null) {
            $query['language'] = $this->language;
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
