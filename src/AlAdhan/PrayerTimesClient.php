<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan;

use IslamicNetwork\AlAdhan\DTO\PrayerTimes\NextPrayerResponse;
use IslamicNetwork\AlAdhan\DTO\PrayerTimes\PrayerCalendarMonthResponse;
use IslamicNetwork\AlAdhan\DTO\PrayerTimes\PrayerCalendarYearResponse;
use IslamicNetwork\AlAdhan\DTO\PrayerTimes\PrayerMethodsResponse;
use IslamicNetwork\AlAdhan\DTO\PrayerTimes\PrayerTimesResponse;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\CalendarByAddressDateRangeRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\CalendarByCityDateRangeRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\CalendarByCoordinatesDateRangeRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\DailyPrayerTimesByAddressRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\DailyPrayerTimesByCityRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\DailyPrayerTimesByCoordinatesRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\GregorianCalendarByAddressMonthRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\GregorianCalendarByAddressYearRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\GregorianCalendarByCityMonthRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\GregorianCalendarByCityYearRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\GregorianCalendarByCoordinatesMonthRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\GregorianCalendarByCoordinatesYearRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\HijriCalendarByAddressMonthRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\HijriCalendarByAddressYearRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\HijriCalendarByCityMonthRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\HijriCalendarByCityYearRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\HijriCalendarByCoordinatesMonthRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\HijriCalendarByCoordinatesYearRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\NextPrayerByAddressRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\NextPrayerByCoordinatesRequest;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class PrayerTimesClient
{
    public function __construct(
        private readonly HttpClient $http,
        private readonly DtoMapper $mapper,
    ) {
    }

    public function dailyByCoordinates(DailyPrayerTimesByCoordinatesRequest $request): PrayerTimesResponse
    {
        return $this->mapResponse(PrayerTimesResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function dailyByAddress(DailyPrayerTimesByAddressRequest $request): PrayerTimesResponse
    {
        return $this->mapResponse(PrayerTimesResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function dailyByCity(DailyPrayerTimesByCityRequest $request): PrayerTimesResponse
    {
        return $this->mapResponse(PrayerTimesResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function nextPrayerByCoordinates(NextPrayerByCoordinatesRequest $request): NextPrayerResponse
    {
        return $this->mapResponse(NextPrayerResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function nextPrayerByAddress(NextPrayerByAddressRequest $request): NextPrayerResponse
    {
        return $this->mapResponse(NextPrayerResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hijriCalendarByCoordinatesYear(HijriCalendarByCoordinatesYearRequest $request): PrayerCalendarYearResponse
    {
        return $this->mapResponse(PrayerCalendarYearResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hijriCalendarByCoordinatesMonth(HijriCalendarByCoordinatesMonthRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function gregorianCalendarByCoordinatesYear(GregorianCalendarByCoordinatesYearRequest $request): PrayerCalendarYearResponse
    {
        return $this->mapResponse(PrayerCalendarYearResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function gregorianCalendarByCoordinatesMonth(GregorianCalendarByCoordinatesMonthRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function calendarByCoordinatesDateRange(CalendarByCoordinatesDateRangeRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hijriCalendarByAddressYear(HijriCalendarByAddressYearRequest $request): PrayerCalendarYearResponse
    {
        return $this->mapResponse(PrayerCalendarYearResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hijriCalendarByAddressMonth(HijriCalendarByAddressMonthRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function gregorianCalendarByAddressYear(GregorianCalendarByAddressYearRequest $request): PrayerCalendarYearResponse
    {
        return $this->mapResponse(PrayerCalendarYearResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function gregorianCalendarByAddressMonth(GregorianCalendarByAddressMonthRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function calendarByAddressDateRange(CalendarByAddressDateRangeRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hijriCalendarByCityYear(HijriCalendarByCityYearRequest $request): PrayerCalendarYearResponse
    {
        return $this->mapResponse(PrayerCalendarYearResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hijriCalendarByCityMonth(HijriCalendarByCityMonthRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function gregorianCalendarByCityYear(GregorianCalendarByCityYearRequest $request): PrayerCalendarYearResponse
    {
        return $this->mapResponse(PrayerCalendarYearResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function gregorianCalendarByCityMonth(GregorianCalendarByCityMonthRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function calendarByCityDateRange(CalendarByCityDateRangeRequest $request): PrayerCalendarMonthResponse
    {
        return $this->mapResponse(PrayerCalendarMonthResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function methods(): PrayerMethodsResponse
    {
        return $this->mapResponse(PrayerMethodsResponse::class, '/methods');
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
