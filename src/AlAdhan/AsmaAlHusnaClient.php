<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan;

use IslamicNetwork\AlAdhan\DTO\AsmaAlHusna\AsmaAlHusnaListResponse;
use IslamicNetwork\AlAdhan\Requests\AsmaAlHusna\AsmaAlHusnaAllRequest;
use IslamicNetwork\AlAdhan\Requests\AsmaAlHusna\AsmaAlHusnaByNumberRequest;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class AsmaAlHusnaClient
{
    public function __construct(
        private readonly HttpClient $http,
        private readonly DtoMapper $mapper,
    ) {
    }

    public function all(AsmaAlHusnaAllRequest $request): AsmaAlHusnaListResponse
    {
        return $this->mapResponse(AsmaAlHusnaListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function byNumber(AsmaAlHusnaByNumberRequest $request): AsmaAlHusnaListResponse
    {
        return $this->mapResponse(AsmaAlHusnaListResponse::class, $request->path(), [], $request->toHeaders());
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
