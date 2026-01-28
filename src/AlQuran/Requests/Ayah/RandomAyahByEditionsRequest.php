<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\Requests\Ayah;

use IslamicNetwork\AlQuran\Enums\ContentEncoding;
use InvalidArgumentException;

final class RandomAyahByEditionsRequest
{
    /** @var list<string> */
    public readonly array $editions;

    /**
     * @param list<string> $editions
     */
    public function __construct(array $editions, public readonly ?ContentEncoding $acceptEncoding = null)
    {
        if ($editions === []) {
            throw new InvalidArgumentException('At least one edition is required.');
        }

        $this->editions = $editions;
    }

    public function path(): string
    {
        return '/ayah/random/editions/' . implode(',', $this->editions);
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
