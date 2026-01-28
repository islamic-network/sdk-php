<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan;

use IslamicNetwork\AlAdhan\DTO\Qibla\QiblaCompassImage;
use IslamicNetwork\AlAdhan\DTO\Qibla\QiblaDirectionResponse;
use IslamicNetwork\AlAdhan\Requests\Qibla\QiblaCompassRequest;
use IslamicNetwork\AlAdhan\Requests\Qibla\QiblaDirectionRequest;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class QiblaClient
{
    public function __construct(
        private readonly HttpClient $http,
        private readonly DtoMapper $mapper,
    ) {
    }

    public function direction(QiblaDirectionRequest $request): QiblaDirectionResponse
    {
        return $this->mapResponse(QiblaDirectionResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function compass(QiblaCompassRequest $request): QiblaCompassImage
    {
        $binary = $this->http->getBinary($request->path(), [], $request->toHeaders());

        return new QiblaCompassImage($binary->contentType, $binary->body);
    }

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    private function mapResponse(string $type, string $path, array $query = [], array $headers = []): object
    {
        $payload = $this->http->getJson($path, $query, $headers);

        return $this->mapper->map($payload, $type);
    }
}
