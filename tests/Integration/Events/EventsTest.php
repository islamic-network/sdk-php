<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\Events;

use IslamicNetwork\Events\EventsClient;
use IslamicNetwork\Events\Requests\Calendar\CalendarMonthRequest;
use IslamicNetwork\Events\Requests\Calendar\CalendarTodayRequest;
use IslamicNetwork\Events\Requests\Events\EventRequest;
use IslamicNetwork\Events\Requests\Events\EventsRequest;
use IslamicNetwork\Events\Requests\People\PeopleRequest;
use IslamicNetwork\Events\Requests\People\PersonEventsRequest;
use IslamicNetwork\Events\Requests\Search\SearchRequest;
use IslamicNetwork\Ilm\Requests\PaginationOptions;
use PHPUnit\Framework\TestCase;

final class EventsTest extends TestCase
{
    public function testEvents(): void
    {
        $client = EventsClient::create();

        $response = $client->events(new EventsRequest(new PaginationOptions(limit: 3)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotNull($response->meta);
        $this->assertGreaterThanOrEqual(1, $response->meta->total);
        $this->assertSame(3, $response->meta->limit);
        $this->assertNotEmpty($response->data);
        $this->assertGreaterThanOrEqual(1, $response->data[0]->date->month);
        $this->assertLessThanOrEqual(12, $response->data[0]->date->month);
    }

    public function testEvent(): void
    {
        $client = EventsClient::create();

        $response = $client->event(new EventRequest('martyrdom-of-husayn'));

        $this->assertSame(200, $response->code);
        $this->assertSame('martyrdom-of-husayn', $response->data->slug);
        $this->assertSame(1, $response->data->date->month);
        $this->assertSame(10, $response->data->date->day);
        $this->assertArrayHasKey('en', $response->data->title);
        $this->assertNotNull($response->data->people);
        $this->assertNotEmpty($response->data->people);
    }

    public function testCalendarMonth(): void
    {
        $client = EventsClient::create();

        $response = $client->calendarMonth(new CalendarMonthRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertSame(1, $response->data->month->number);
        $this->assertNotEmpty($response->data->events);

        foreach ($response->data->events as $event) {
            $this->assertNotNull($event->date);
            $this->assertSame(1, $event->date->month);
        }
    }

    public function testCalendarTodayWithDate(): void
    {
        $client = EventsClient::create();

        $response = $client->calendarToday(new CalendarTodayRequest('25-06-2026'));

        $this->assertSame(200, $response->code);
        $this->assertSame('2026-06-25', $response->data->date->gregorian);
        $this->assertSame(1, $response->data->date->hijri->month);
        $this->assertSame(10, $response->data->date->hijri->day);
        $this->assertNotEmpty($response->data->events);
    }

    public function testPeopleAndPersonEvents(): void
    {
        $client = EventsClient::create();

        $people = $client->people(new PeopleRequest());

        $this->assertSame(200, $people->code);
        $this->assertNotNull($people->meta);
        $this->assertNotEmpty($people->data);
        $this->assertGreaterThanOrEqual(1, $people->data[0]->events);

        $response = $client->personEvents(new PersonEventsRequest('husayn-ibn-ali'));

        $this->assertSame(200, $response->code);
        $this->assertSame('husayn-ibn-ali', $response->data->person->slug);
        $this->assertNotEmpty($response->data->events);
    }

    public function testSearch(): void
    {
        $client = EventsClient::create();

        $response = $client->search(new SearchRequest('karbala'));

        $this->assertSame(200, $response->code);
        $this->assertSame('karbala', $response->data->query);
        $this->assertNotEmpty($response->data->results);
        $this->assertSame('event', $response->data->results[0]->type);
        $this->assertNotEmpty($response->data->results[0]->matched_in);
    }
}
