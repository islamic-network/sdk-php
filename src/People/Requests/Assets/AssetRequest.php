<?php

declare(strict_types=1);

namespace IslamicNetwork\People\Requests\Assets;

/** GET /assets/{id} — image passthrough, streamed with the object's content type. */
final class AssetRequest
{
    public function __construct(public readonly string $id)
    {
    }

    public function path(): string
    {
        return '/assets/' . rawurlencode($this->id);
    }
}
