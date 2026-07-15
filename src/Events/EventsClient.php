<?php

declare(strict_types=1);

namespace IslamicNetwork\Events;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\Events\DTO\Calendar\CalendarDayResponse;
use IslamicNetwork\Events\DTO\Calendar\CalendarMonthResponse;
use IslamicNetwork\Events\DTO\Calendar\CalendarTodayResponse;
use IslamicNetwork\Events\DTO\Events\EventResponse;
use IslamicNetwork\Events\DTO\Events\EventsResponse;
use IslamicNetwork\Events\DTO\People\PeopleResponse;
use IslamicNetwork\Events\DTO\People\PersonEventsResponse;
use IslamicNetwork\Events\DTO\Search\SearchResponse;
use IslamicNetwork\Events\Requests\Calendar\CalendarDayRequest;
use IslamicNetwork\Events\Requests\Calendar\CalendarMonthRequest;
use IslamicNetwork\Events\Requests\Calendar\CalendarTodayRequest;
use IslamicNetwork\Events\Requests\Events\EventRequest;
use IslamicNetwork\Events\Requests\Events\EventsRequest;
use IslamicNetwork\Events\Requests\People\PeopleRequest;
use IslamicNetwork\Events\Requests\People\PersonEventsRequest;
use IslamicNetwork\Events\Requests\Search\SearchRequest;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class EventsClient
{
    public const DEFAULT_BASE_URL = 'https://events.api.islamic.network/v1';

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

    public function events(EventsRequest $request): EventsResponse
    {
        return $this->mapResponse(EventsResponse::class, $request->path(), $request->toQuery());
    }

    public function event(EventRequest $request): EventResponse
    {
        return $this->mapResponse(EventResponse::class, $request->path());
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

    public function people(PeopleRequest $request): PeopleResponse
    {
        return $this->mapResponse(PeopleResponse::class, $request->path(), $request->toQuery());
    }

    public function personEvents(PersonEventsRequest $request): PersonEventsResponse
    {
        return $this->mapResponse(PersonEventsResponse::class, $request->path(), $request->toQuery());
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
