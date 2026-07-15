<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\People;

use IslamicNetwork\Ilm\Requests\PaginationOptions;
use IslamicNetwork\People\PeopleClient;
use IslamicNetwork\People\Requests\People\PeopleRequest;
use IslamicNetwork\People\Requests\People\PersonEventsRequest;
use IslamicNetwork\People\Requests\People\PersonQuotesRequest;
use IslamicNetwork\People\Requests\People\PersonRequest;
use IslamicNetwork\People\Requests\Search\SearchRequest;
use PHPUnit\Framework\TestCase;

final class PeopleTest extends TestCase
{
    public function testPeople(): void
    {
        $client = PeopleClient::create();

        $response = $client->people(new PeopleRequest(options: new PaginationOptions(limit: 5)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotNull($response->meta);
        $this->assertGreaterThanOrEqual(1, $response->meta->total);
        $this->assertSame(5, $response->meta->limit);
        $this->assertNotEmpty($response->data);
        $this->assertNotSame('', $response->data[0]->slug);
        $this->assertNotSame('', $response->data[0]->kind);
        $this->assertArrayHasKey('en', $response->data[0]->name);
    }

    public function testPeopleKindFilter(): void
    {
        $client = PeopleClient::create();

        $response = $client->people(new PeopleRequest(kind: 'prophet'));

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data);

        foreach ($response->data as $person) {
            $this->assertSame('prophet', $person->kind);
        }
    }

    public function testPerson(): void
    {
        $client = PeopleClient::create();

        $response = $client->person(new PersonRequest('husayn-ibn-ali'));

        $this->assertSame(200, $response->code);
        $this->assertSame('husayn-ibn-ali', $response->data->slug);
        $this->assertSame('family-of-the-prophet', $response->data->kind);
        $this->assertArrayHasKey('en', $response->data->name);
        $this->assertNotNull($response->data->events);
        $this->assertGreaterThanOrEqual(1, $response->data->events->total);
        $this->assertNotEmpty($response->data->events->preview);
    }

    public function testPersonEventsAndQuotes(): void
    {
        $client = PeopleClient::create();

        $events = $client->personEvents(new PersonEventsRequest('husayn-ibn-ali'));

        $this->assertSame(200, $events->code);
        $this->assertSame('husayn-ibn-ali', $events->data->person->slug);
        $this->assertNotEmpty($events->data->events);

        $quotes = $client->personQuotes(new PersonQuotesRequest('bayazid-bistami', new PaginationOptions(limit: 3)));

        $this->assertSame(200, $quotes->code);
        $this->assertSame('bayazid-bistami', $quotes->data->person->slug);
        $this->assertNotEmpty($quotes->data->quotes);
        $this->assertNotSame('', $quotes->data->quotes[0]->original->text);
    }

    public function testSearch(): void
    {
        $client = PeopleClient::create();

        $response = $client->search(new SearchRequest('husayn'));

        $this->assertSame(200, $response->code);
        $this->assertSame('husayn', $response->data->query);
        $this->assertNotEmpty($response->data->results);
        $this->assertSame('person', $response->data->results[0]->type);
        $this->assertNotEmpty($response->data->results[0]->matched_in);
    }
}
