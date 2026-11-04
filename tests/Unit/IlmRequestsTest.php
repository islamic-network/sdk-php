<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Unit;

use IslamicNetwork\Events\Requests\Events\EventRequest;
use IslamicNetwork\Events\Requests\Events\EventsRequest;
use IslamicNetwork\Events\Requests\People\PersonEventsRequest;
use IslamicNetwork\Ilm\Requests\PaginationOptions;
use IslamicNetwork\People\Requests\People\PeopleRequest;
use IslamicNetwork\Pray\Requests\Calendar\CalendarDayRequest;
use IslamicNetwork\Pray\Requests\Calendar\CalendarTodayRequest;
use IslamicNetwork\Pray\Requests\Search\SearchRequest as PraySearchRequest;
use IslamicNetwork\Quotes\Requests\Quotes\QuoteRequest;
use IslamicNetwork\Quotes\Requests\Quotes\QuotesRequest;
use IslamicNetwork\Quotes\Requests\Quotes\RandomQuoteRequest;
use IslamicNetwork\Stories\Requests\Assets\AssetRequest;
use IslamicNetwork\Stories\Requests\Stories\StoriesRequest;
use PHPUnit\Framework\TestCase;

final class IlmRequestsTest extends TestCase
{
    public function testPaginationOptionsQuery(): void
    {
        $this->assertSame([], (new PaginationOptions())->toQuery());
        $this->assertSame(['page' => 2, 'limit' => 10], (new PaginationOptions(page: 2, limit: 10))->toQuery());
        $this->assertSame(['limit' => 5], (new PaginationOptions(limit: 5))->toQuery());
    }

    public function testPrayCalendarRequests(): void
    {
        $this->assertSame('/calendar/today', (new CalendarTodayRequest())->path());
        $this->assertSame([], (new CalendarTodayRequest())->toQuery());
        $this->assertSame(['date' => '25-06-2026'], (new CalendarTodayRequest('25-06-2026'))->toQuery());
        $this->assertSame('/calendar/1/10', (new CalendarDayRequest(1, 10))->path());
    }

    public function testPraySearchRequestMergesTypeAndPagination(): void
    {
        $request = new PraySearchRequest('tasbih', 'salaats,adhkaars', new PaginationOptions(page: 2, limit: 5));

        $this->assertSame('/search', $request->path());
        $this->assertSame(['q' => 'tasbih', 'type' => 'salaats,adhkaars', 'page' => 2, 'limit' => 5], $request->toQuery());
        $this->assertSame(['q' => 'tasbih'], (new PraySearchRequest('tasbih'))->toQuery());
    }

    public function testEventsRequests(): void
    {
        $this->assertSame('/events/martyrdom-of-husayn', (new EventRequest('martyrdom-of-husayn'))->path());

        $request = new PersonEventsRequest('husayn-ibn-ali', new PaginationOptions(limit: 3));

        $this->assertSame('/people/husayn-ibn-ali/events', $request->path());
        $this->assertSame(['limit' => 3], $request->toQuery());

        $births = new EventsRequest(new PaginationOptions(page: 2), category: 'birth');
        $this->assertSame(['category' => 'birth', 'page' => 2], $births->toQuery());
        $this->assertSame([], (new EventsRequest())->toQuery());
    }

    public function testPeopleRequestMergesKindAndPagination(): void
    {
        $request = new PeopleRequest(kind: 'prophet', options: new PaginationOptions(page: 1, limit: 10));

        $this->assertSame('/people', $request->path());
        $this->assertSame(['kind' => 'prophet', 'page' => 1, 'limit' => 10], $request->toQuery());
        $this->assertSame([], (new PeopleRequest())->toQuery());
    }

    public function testQuotesRequests(): void
    {
        $request = new QuotesRequest(author: 'bayazid-bistami', tag: 'knowledge', lang: 'ur', original: 'en', options: new PaginationOptions(limit: 2));

        $this->assertSame('/quotes', $request->path());
        $this->assertSame(
            ['author' => 'bayazid-bistami', 'tag' => 'knowledge', 'lang' => 'ur', 'original' => 'en', 'limit' => 2],
            $request->toQuery(),
        );
        $this->assertSame('/quotes/88', (new QuoteRequest(88))->path());
        $this->assertSame('/quotes/random', (new RandomQuoteRequest())->path());
        $this->assertSame(['author' => 'bayazid-bistami'], (new RandomQuoteRequest(author: 'bayazid-bistami'))->toQuery());
    }

    public function testStoriesRequests(): void
    {
        $request = new StoriesRequest(tag: 'remembrance', person: 'jalal-ad-din-muhammad-rumi', options: new PaginationOptions(page: 1));

        $this->assertSame('/stories', $request->path());
        $this->assertSame(['tag' => 'remembrance', 'person' => 'jalal-ad-din-muhammad-rumi', 'page' => 1], $request->toQuery());
        $this->assertSame('/assets/2441659b-2535-4103-82da-1b022ce89eae', (new AssetRequest('2441659b-2535-4103-82da-1b022ce89eae'))->path());
    }
}
