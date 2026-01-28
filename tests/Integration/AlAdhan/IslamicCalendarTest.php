<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\AlAdhan;

use IslamicNetwork\AlAdhan\AlAdhanClient;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\GToHCalendarRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\GToHRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\HToGRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\IslamicHolidaysByHijriYearRequest;
use IslamicNetwork\AlAdhan\Requests\IslamicCalendar\NextHijriHolidayRequest;
use PHPUnit\Framework\TestCase;

final class IslamicCalendarTest extends TestCase
{
    public function testGregorianToHijriDate(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->islamicCalendar()->gToH(new GToHRequest('01-01-2025'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame('01-01-2025', $response->data->gregorian->date);
        $this->assertNotEmpty($response->data->hijri->date);
    }

    public function testHijriToGregorianDate(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->islamicCalendar()->hToG(new HToGRequest('01-07-1446'));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertSame('01-07-1446', $response->data->hijri->date);
    }

    public function testGregorianToHijriCalendar(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->islamicCalendar()->gToHCalendar(new GToHCalendarRequest(1, 2025));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }

    public function testNextHijriHoliday(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->islamicCalendar()->nextHijriHoliday(new NextHijriHolidayRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data->hijri->date);
    }

    public function testIslamicHolidaysByHijriYear(): void
    {
        $client = AlAdhanClient::create();

        $response = $client->islamicCalendar()->islamicHolidaysByHijriYear(
            new IslamicHolidaysByHijriYearRequest(1446)
        );

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }

    public function testMetaEndpoints(): void
    {
        $client = AlAdhanClient::create();

        $year = $client->islamicCalendar()->currentIslamicYear();
        $month = $client->islamicCalendar()->currentIslamicMonth();
        $methods = $client->islamicCalendar()->methods();

        $this->assertSame(200, $year->code);
        $this->assertSame(200, $month->code);
        $this->assertSame(200, $methods->code);
        $this->assertNotEmpty($methods->data);
    }
}
