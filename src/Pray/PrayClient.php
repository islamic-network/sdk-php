<?php

declare(strict_types=1);

namespace IslamicNetwork\Pray;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Pray\DTO\Calendar\CalendarDayResponse;
use IslamicNetwork\Pray\DTO\Calendar\CalendarMonthResponse;
use IslamicNetwork\Pray\DTO\Calendar\CalendarTodayResponse;
use IslamicNetwork\Pray\DTO\Days\DaysResponse;
use IslamicNetwork\Pray\DTO\Months\MonthsResponse;
use IslamicNetwork\Pray\DTO\Recitations\RecitationResponse;
use IslamicNetwork\Pray\DTO\Recitations\RecitationsResponse;
use IslamicNetwork\Pray\DTO\Salaats\SalaatResponse;
use IslamicNetwork\Pray\DTO\Salaats\SalaatsResponse;
use IslamicNetwork\Pray\DTO\Search\SearchResponse;
use IslamicNetwork\Pray\Requests\Calendar\CalendarDayRequest;
use IslamicNetwork\Pray\Requests\Calendar\CalendarMonthRequest;
use IslamicNetwork\Pray\Requests\Calendar\CalendarTodayRequest;
use IslamicNetwork\Pray\Requests\Days\DaysRequest;
use IslamicNetwork\Pray\Requests\Months\MonthsRequest;
use IslamicNetwork\Pray\Requests\Recitations\AdhkaarRequest;
use IslamicNetwork\Pray\Requests\Recitations\AdhkaarsRequest;
use IslamicNetwork\Pray\Requests\Recitations\DuaRequest;
use IslamicNetwork\Pray\Requests\Recitations\DuasRequest;
use IslamicNetwork\Pray\Requests\Recitations\SalawaatRequest;
use IslamicNetwork\Pray\Requests\Recitations\SalawaatsRequest;
use IslamicNetwork\Pray\Requests\Salaats\SalaatRequest;
use IslamicNetwork\Pray\Requests\Salaats\SalaatsRequest;
use IslamicNetwork\Pray\Requests\Search\SearchRequest;
use IslamicNetwork\Support\DtoMapper;

final class PrayClient
{
    public const DEFAULT_BASE_URL = 'https://pray.api.islamic.network/v1';

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

    public function months(MonthsRequest $request): MonthsResponse
    {
        return $this->mapResponse(MonthsResponse::class, $request->path());
    }

    public function calendarToday(CalendarTodayRequest $request): CalendarTodayResponse
    {
        return $this->mapResponse(CalendarTodayResponse::class, $request->path(), $request->toQuery());
    }

    public function calendarMonth(CalendarMonthRequest $request): CalendarMonthResponse
    {
        return $this->mapResponse(CalendarMonthResponse::class, $request->path());
    }

    public function calendarDay(CalendarDayRequest $request): CalendarDayResponse
    {
        return $this->mapResponse(CalendarDayResponse::class, $request->path());
    }

    public function days(DaysRequest $request): DaysResponse
    {
        return $this->mapResponse(DaysResponse::class, $request->path(), $request->toQuery());
    }

    public function salaats(SalaatsRequest $request): SalaatsResponse
    {
        return $this->mapResponse(SalaatsResponse::class, $request->path(), $request->toQuery());
    }

    public function salaat(SalaatRequest $request): SalaatResponse
    {
        return $this->mapResponse(SalaatResponse::class, $request->path());
    }

    public function salawaats(SalawaatsRequest $request): RecitationsResponse
    {
        return $this->mapResponse(RecitationsResponse::class, $request->path(), $request->toQuery());
    }

    public function salawaat(SalawaatRequest $request): RecitationResponse
    {
        return $this->mapResponse(RecitationResponse::class, $request->path());
    }

    public function adhkaars(AdhkaarsRequest $request): RecitationsResponse
    {
        return $this->mapResponse(RecitationsResponse::class, $request->path(), $request->toQuery());
    }

    public function adhkaar(AdhkaarRequest $request): RecitationResponse
    {
        return $this->mapResponse(RecitationResponse::class, $request->path());
    }

    public function duas(DuasRequest $request): RecitationsResponse
    {
        return $this->mapResponse(RecitationsResponse::class, $request->path(), $request->toQuery());
    }

    public function dua(DuaRequest $request): RecitationResponse
    {
        return $this->mapResponse(RecitationResponse::class, $request->path());
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
