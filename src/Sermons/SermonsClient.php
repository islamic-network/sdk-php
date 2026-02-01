<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Sermons\DTO\MonthSermons;
use IslamicNetwork\Sermons\DTO\SermonLanguage;
use IslamicNetwork\Sermons\DTO\SermonSource;
use IslamicNetwork\Sermons\Requests\LanguagesRequest;
use IslamicNetwork\Sermons\Requests\MonthSermonsRequest;
use IslamicNetwork\Sermons\Requests\SourcesRequest;
use IslamicNetwork\Sermons\Requests\YearSermonsRequest;
use IslamicNetwork\Support\DtoMapper;

final class SermonsClient
{
    public const DEFAULT_BASE_URL = 'https://sermons.islamic.network/api';

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

    /**
     * @return list<SermonSource>
     */
    public function sources(SourcesRequest $request): array
    {
        $payload = $this->http->getJson($request->path());

        return $this->mapper->mapList($payload, SermonSource::class);
    }

    /**
     * @return list<SermonLanguage>
     */
    public function languages(LanguagesRequest $request): array
    {
        $payload = $this->http->getJson($request->path());

        return $this->mapper->mapList($payload, SermonLanguage::class);
    }

    /**
     * @return list<MonthSermons>
     */
    public function yearSermons(YearSermonsRequest $request): array
    {
        $payload = $this->http->getJson($request->path());

        return $this->mapper->mapList($payload, MonthSermons::class);
    }

    public function monthSermons(MonthSermonsRequest $request): MonthSermons
    {
        $payload = $this->http->getJson($request->path());

        return $this->mapper->map($payload, MonthSermons::class);
    }
}
