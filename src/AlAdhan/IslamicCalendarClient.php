<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan;

use IslamicNetwork\AlAdhan\DTO\IslamicCalendar\HijriCalendarListResponse;
use IslamicNetwork\AlAdhan\DTO\IslamicCalendar\HijriCalendarSingleResponse;
use IslamicNetwork\AlAdhan\DTO\IslamicCalendar\HijriHolidayListResponse;
use IslamicNetwork\AlAdhan\DTO\IslamicCalendar\HijriNumericResponse;
use IslamicNetwork\AlAdhan\DTO\IslamicCalendar\IslamicCalendarMethodsResponse;
use IslamicNetwork\AlAdhan\DTO\IslamicCalendar\IslamicMonthsResponse;
use IslamicNetwork\AlAdhan\DTO\IslamicCalendar\SpecialDaysResponse;
use IslamicNetwork\AlAdhan\Enums\ContentEncoding;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\GToHCalendarRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\GToHRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\HToGCalendarRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\HToGRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\HijriHolidaysRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\IslamicHolidaysByHijriYearRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\IslamicYearFromGregorianForRamadanRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\NextHijriHolidayRequest;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class IslamicCalendarClient
{
    public function __construct(
        private readonly HttpClient $http,
        private readonly DtoMapper $mapper,
    ) {
    }

    public function gToHCalendar(GToHCalendarRequest $request): HijriCalendarListResponse
    {
        return $this->mapResponse(HijriCalendarListResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hToGCalendar(HToGCalendarRequest $request): HijriCalendarListResponse
    {
        return $this->mapResponse(HijriCalendarListResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function gToH(GToHRequest $request): HijriCalendarSingleResponse
    {
        return $this->mapResponse(HijriCalendarSingleResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function hToG(HToGRequest $request): HijriCalendarSingleResponse
    {
        return $this->mapResponse(HijriCalendarSingleResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function nextHijriHoliday(NextHijriHolidayRequest $request): HijriCalendarSingleResponse
    {
        return $this->mapResponse(HijriCalendarSingleResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function currentIslamicYear(?ContentEncoding $acceptEncoding = null): HijriNumericResponse
    {
        return $this->mapResponse(HijriNumericResponse::class, '/currentIslamicYear', [], $this->encodingHeader($acceptEncoding));
    }

    public function currentIslamicMonth(?ContentEncoding $acceptEncoding = null): HijriNumericResponse
    {
        return $this->mapResponse(HijriNumericResponse::class, '/currentIslamicMonth', [], $this->encodingHeader($acceptEncoding));
    }

    public function islamicYearFromGregorianForRamadan(IslamicYearFromGregorianForRamadanRequest $request): HijriNumericResponse
    {
        return $this->mapResponse(HijriNumericResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function hijriHolidays(HijriHolidaysRequest $request): HijriHolidayListResponse
    {
        return $this->mapResponse(HijriHolidayListResponse::class, $request->path(), [], $request->toHeaders());
    }

    public function specialDays(?ContentEncoding $acceptEncoding = null): SpecialDaysResponse
    {
        return $this->mapResponse(SpecialDaysResponse::class, '/specialDays', [], $this->encodingHeader($acceptEncoding));
    }

    public function islamicMonths(?ContentEncoding $acceptEncoding = null): IslamicMonthsResponse
    {
        return $this->mapResponse(IslamicMonthsResponse::class, '/islamicMonths', [], $this->encodingHeader($acceptEncoding));
    }

    public function islamicHolidaysByHijriYear(IslamicHolidaysByHijriYearRequest $request): HijriCalendarListResponse
    {
        return $this->mapResponse(HijriCalendarListResponse::class, $request->path(), $request->toQuery(), $request->toHeaders());
    }

    public function methods(?ContentEncoding $acceptEncoding = null): IslamicCalendarMethodsResponse
    {
        return $this->mapResponse(IslamicCalendarMethodsResponse::class, '/islamicCalendar/methods', [], $this->encodingHeader($acceptEncoding));
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

    /**
     * @return array<string, string>
     */
    private function encodingHeader(?ContentEncoding $encoding): array
    {
        if ($encoding === null) {
            return [];
        }

        return ['Accept-Encoding' => $encoding->value];
    }
}
