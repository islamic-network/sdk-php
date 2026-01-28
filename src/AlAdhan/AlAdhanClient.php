<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan;

use Illuminate\Http\Client\Factory;
use IslamicNetwork\Http\HttpClient;
use IslamicNetwork\Support\DtoMapper;

final class AlAdhanClient
{
    public const DEFAULT_BASE_URL = 'https://api.aladhan.com/v1';

    private readonly PrayerTimesClient $prayerTimes;
    private readonly IslamicCalendarClient $islamicCalendar;
    private readonly QiblaClient $qibla;
    private readonly AsmaAlHusnaClient $asmaAlHusna;

    public function __construct(private readonly HttpClient $http, private readonly DtoMapper $mapper)
    {
        $this->prayerTimes = new PrayerTimesClient($this->http, $this->mapper);
        $this->islamicCalendar = new IslamicCalendarClient($this->http, $this->mapper);
        $this->qibla = new QiblaClient($this->http, $this->mapper);
        $this->asmaAlHusna = new AsmaAlHusnaClient($this->http, $this->mapper);
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

    public function prayerTimes(): PrayerTimesClient
    {
        return $this->prayerTimes;
    }

    public function islamicCalendar(): IslamicCalendarClient
    {
        return $this->islamicCalendar;
    }

    public function qibla(): QiblaClient
    {
        return $this->qibla;
    }

    public function asmaAlHusna(): AsmaAlHusnaClient
    {
        return $this->asmaAlHusna;
    }
}
