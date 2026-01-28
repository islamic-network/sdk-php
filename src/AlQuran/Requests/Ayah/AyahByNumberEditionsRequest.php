<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Ayah;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;
use InvalidArgumentException;

final class AyahByNumberEditionsRequest
{
    /** @var list<string> */
    public readonly array $editions;

    /**
     * @param list<string> $editions
     */
    public function __construct(
        public readonly int $number,
        array $editions,
        public readonly ?ContentEncoding $acceptEncoding = null,
    ) {
        if ($editions === []) {
            throw new InvalidArgumentException('At least one edition is required.');
        }

        $this->editions = $editions;
    }

    public function path(): string
    {
        return '/ayah/' . $this->number . '/editions/' . implode(',', $this->editions);
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
