<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\Pray;

use IslamicNetwork\Ilm\Requests\PaginationOptions;
use IslamicNetwork\Pray\PrayClient;
use IslamicNetwork\Pray\Requests\Calendar\CalendarDayRequest;
use IslamicNetwork\Pray\Requests\Calendar\CalendarTodayRequest;
use IslamicNetwork\Pray\Requests\Months\MonthsRequest;
use IslamicNetwork\Pray\Requests\Recitations\AdhkaarsRequest;
use IslamicNetwork\Pray\Requests\Recitations\DuasRequest;
use IslamicNetwork\Pray\Requests\Recitations\SalawaatRequest;
use IslamicNetwork\Pray\Requests\Recitations\SalawaatsRequest;
use IslamicNetwork\Pray\Requests\Salaats\SalaatRequest;
use IslamicNetwork\Pray\Requests\Salaats\SalaatsRequest;
use IslamicNetwork\Pray\Requests\Search\SearchRequest;
use PHPUnit\Framework\TestCase;

final class PrayTest extends TestCase
{
    public function testMonths(): void
    {
        $client = PrayClient::create();

        $response = $client->months(new MonthsRequest());

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertCount(12, $response->data);
        $this->assertSame(1, $response->data[0]->number);
        $this->assertSame(12, $response->data[11]->number);
        $this->assertArrayHasKey('en', $response->data[0]->name);
        $this->assertNotSame('', $response->data[0]->url);
    }

    public function testCalendarToday(): void
    {
        $client = PrayClient::create();

        $response = $client->calendarToday(new CalendarTodayRequest());

        $this->assertSame(200, $response->code);
        $this->assertMatchesRegularExpression('/^\d{4}-\d{2}-\d{2}$/', $response->data->date->gregorian);
        $this->assertGreaterThan(1400, $response->data->date->hijri->year);
        $this->assertGreaterThanOrEqual(1, $response->data->date->hijri->month);
        $this->assertLessThanOrEqual(12, $response->data->date->hijri->month);
    }

    public function testCalendarTodayWithDate(): void
    {
        $client = PrayClient::create();

        $response = $client->calendarToday(new CalendarTodayRequest('25-06-2026'));

        $this->assertSame(200, $response->code);
        $this->assertSame('2026-06-25', $response->data->date->gregorian);
        $this->assertSame(1448, $response->data->date->hijri->year);
        $this->assertSame(1, $response->data->date->hijri->month);
        $this->assertSame(10, $response->data->date->hijri->day);
        $this->assertNotNull($response->data->day);
        $this->assertSame('muharram-10', $response->data->day->slug);
    }

    public function testCalendarDay(): void
    {
        $client = PrayClient::create();

        $response = $client->calendarDay(new CalendarDayRequest(1, 10));

        $this->assertSame(200, $response->code);
        $this->assertSame('muharram-10', $response->data->slug);
        $this->assertSame(10, $response->data->number);
        $this->assertSame(1, $response->data->month->number);
        $this->assertNotEmpty($response->data->events);
        $this->assertNotEmpty($response->data->salawaats);
        $this->assertNotSame('', $response->data->salawaats[0]->formula);
    }

    public function testSalaatsListAndItem(): void
    {
        $client = PrayClient::create();

        $list = $client->salaats(new SalaatsRequest(new PaginationOptions(limit: 5)));

        $this->assertSame(200, $list->code);
        $this->assertNotNull($list->meta);
        $this->assertGreaterThanOrEqual(1, $list->meta->total);
        $this->assertSame(5, $list->meta->limit);
        $this->assertNotEmpty($list->data);

        $slug = $list->data[0]->slug;
        $item = $client->salaat(new SalaatRequest($slug));

        $this->assertSame(200, $item->code);
        $this->assertSame($slug, $item->data->slug);
        $this->assertArrayHasKey('en', $item->data->name);
    }

    public function testRecitations(): void
    {
        $client = PrayClient::create();

        $salawaats = $client->salawaats(new SalawaatsRequest());
        $this->assertSame(200, $salawaats->code);
        $this->assertNotNull($salawaats->meta);
        $this->assertNotEmpty($salawaats->data);
        $this->assertNotSame('', $salawaats->data[0]->formula);

        $slug = $salawaats->data[0]->slug;
        $item = $client->salawaat(new SalawaatRequest($slug));
        $this->assertSame($slug, $item->data->slug);
        $this->assertNotSame('', $item->data->formula);

        $this->assertSame(200, $client->adhkaars(new AdhkaarsRequest())->code);
        $this->assertSame(200, $client->duas(new DuasRequest())->code);
    }

    public function testSearch(): void
    {
        $client = PrayClient::create();

        $response = $client->search(new SearchRequest('tasbih'));

        $this->assertSame(200, $response->code);
        $this->assertSame('tasbih', $response->data->query);
        $this->assertGreaterThanOrEqual(1, $response->data->total);
        $this->assertNotEmpty($response->data->results);
        $this->assertNotEmpty($response->data->results[0]->matched_in);
        $this->assertNotSame('', $response->data->results[0]->type);
    }
}
