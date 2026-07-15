<?php

declare(strict_types=1);

namespace IslamicNetwork\Stories;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\Http\BinaryResponse;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Stories\DTO\Search\SearchResponse;
use IslamicNetwork\Stories\DTO\Stories\StoriesResponse;
use IslamicNetwork\Stories\DTO\Stories\StoryResponse;
use IslamicNetwork\Stories\DTO\Tags\TagsResponse;
use IslamicNetwork\Stories\Requests\Assets\AssetRequest;
use IslamicNetwork\Stories\Requests\Search\SearchRequest;
use IslamicNetwork\Stories\Requests\Stories\StoriesRequest;
use IslamicNetwork\Stories\Requests\Stories\StoryRequest;
use IslamicNetwork\Stories\Requests\Tags\TagsRequest;
use IslamicNetwork\Support\DtoMapper;

final class StoriesClient
{
    public const DEFAULT_BASE_URL = 'https://stories.api.islamic.network/v1';

    public function __construct(private readonly HttpClient $http, private readonly DtoMapper $mapper)
    {
    }

    public static function create(
        ?string $baseUrl = null,
        array $defaultHeaders = [],
        array $defaultQuery = [],
        ?float $timeoutSeconds = null,
        ?string $userAgent = null,
    ): self {
        $factory = new Factory();
        $http = new HttpClient(
            $factory,
            $baseUrl ?? self::DEFAULT_BASE_URL,
            $defaultHeaders,
            $defaultQuery,
            $timeoutSeconds,
            $userAgent,
        );
        $mapper = new DtoMapper();

        return new self($http, $mapper);
    }

    public function stories(StoriesRequest $request): StoriesResponse
    {
        return $this->mapResponse(StoriesResponse::class, $request->path(), $request->toQuery());
    }

    public function story(StoryRequest $request): StoryResponse
    {
        return $this->mapResponse(StoryResponse::class, $request->path());
    }

    public function tags(TagsRequest $request): TagsResponse
    {
        return $this->mapResponse(TagsResponse::class, $request->path(), $request->toQuery());
    }

    public function asset(AssetRequest $request): BinaryResponse
    {
        return $this->http->getBinary($request->path());
    }

    public function search(SearchRequest $request): SearchResponse
    {
        return $this->mapResponse(SearchResponse::class, $request->path(), $request->toQuery());
    }

    /**
     * @template T of object
     * @param class-string<T> $type
     * @return T
     */
    private function mapResponse(string $type, string $path, array $query = []): object
    {
        $payload = $this->http->getJson($path, $query);

        return $this->mapper->map($payload, $type);
    }
}
