<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlAdhan;

use IslamicNetwork\AlAdhan\AlAdhanClient;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\DailyPrayerTimesByCoordinatesRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\GregorianCalendarByCoordinatesMonthRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\HijriCalendarByCoordinatesYearRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\NextPrayerByCoordinatesRequest;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\PrayerTimesOptions;
use PHPUnit\Framework\TestCase;

final class PrayerTimesTest extends TestCase
{
    public function testDailyPrayerTimesByCoordinates(): void
    {
        $client = AlAdhanClient::create();

        $request = new DailyPrayerTimesByCoordinatesRequest(
            date: '01-01-2025',
            latitude: 51.5194682,
            longitude: -0.1360365,
            options: new PrayerTimesOptions(),
        );

        $response = $client->prayerTimes()->dailyByCoordinates($request);

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data->timings->Fajr);
        $this->assertNotEmpty($response->data->timings->Isha);
        $this->assertSame('01-01-2025', $response->data->date->gregorian->date);
    }

    public function testNextPrayerByCoordinates(): void
    {
        $client = AlAdhanClient::create();

        $request = new NextPrayerByCoordinatesRequest(
            date: '01-01-2025',
            latitude: 51.5194682,
            longitude: -0.1360365,
            options: new PrayerTimesOptions(),
        );

        $response = $client->prayerTimes()->nextPrayerByCoordinates($request);

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data->timings);
    }

    public function testPrayerCalendarByCoordinatesMonth(): void
    {
        $client = AlAdhanClient::create();

        $request = new GregorianCalendarByCoordinatesMonthRequest(
            year: 2025,
            month: 1,
            latitude: 51.5194682,
            longitude: -0.1360365,
            options: new PrayerTimesOptions(),
        );

        $response = $client->prayerTimes()->gregorianCalendarByCoordinatesMonth($request);

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }

    public function testPrayerCalendarByCoordinatesYear(): void
    {
        $client = AlAdhanClient::create();

        $request = new HijriCalendarByCoordinatesYearRequest(
            year: 1446,
            latitude: 51.5194682,
            longitude: -0.1360365,
            options: new PrayerTimesOptions(),
        );

        $response = $client->prayerTimes()->hijriCalendarByCoordinatesYear($request);

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->months());
    }

    public function testPrayerMethods(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->prayerTimes()->methods();

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertArrayHasKey('MWL', $response->data);
    }
}
