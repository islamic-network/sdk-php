<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\Quotes;

use IslamicNetwork\Ilm\Requests\PaginationOptions;
use IslamicNetwork\Quotes\QuotesClient;
use IslamicNetwork\Quotes\Requests\People\PersonQuotesRequest;
use IslamicNetwork\Quotes\Requests\Quotes\QuoteRequest;
use IslamicNetwork\Quotes\Requests\Quotes\QuotesRequest;
use IslamicNetwork\Quotes\Requests\Quotes\RandomQuoteRequest;
use IslamicNetwork\Quotes\Requests\Search\SearchRequest;
use PHPUnit\Framework\TestCase;

final class QuotesTest extends TestCase
{
    public function testQuotes(): void
    {
        $client = QuotesClient::create();

        $response = $client->quotes(new QuotesRequest(options: new PaginationOptions(limit: 2)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotNull($response->meta);
        $this->assertGreaterThanOrEqual(1, $response->meta->total);
        $this->assertSame(2, $response->meta->limit);
        $this->assertCount(2, $response->data);
        $this->assertGreaterThan(0, $response->data[0]->id);
        $this->assertNotSame('', $response->data[0]->original->text);
        $this->assertNotSame('', $response->data[0]->original->language);
    }

    public function testQuoteById(): void
    {
        $client = QuotesClient::create();

        $response = $client->quote(new QuoteRequest(1));

        $this->assertSame(200, $response->code);
        $this->assertSame(1, $response->data->id);
        $this->assertNotSame('', $response->data->original->text);
    }

    public function testRandom(): void
    {
        $client = QuotesClient::create();

        $response = $client->random(new RandomQuoteRequest());

        $this->assertSame(200, $response->code);
        $this->assertGreaterThan(0, $response->data->id);
        $this->assertNotSame('', $response->data->original->text);
    }

    public function testRandomWithAuthorFilter(): void
    {
        $client = QuotesClient::create();

        $response = $client->random(new RandomQuoteRequest(author: 'bayazid-bistami'));

        $this->assertSame(200, $response->code);
        $this->assertNotNull($response->data->author);
        $this->assertSame('bayazid-bistami', $response->data->author->slug);
    }

    public function testPersonQuotes(): void
    {
        $client = QuotesClient::create();

        $response = $client->personQuotes(new PersonQuotesRequest('bayazid-bistami', new PaginationOptions(limit: 3)));

        $this->assertSame(200, $response->code);
        $this->assertSame('bayazid-bistami', $response->data->person->slug);
        $this->assertNotEmpty($response->data->quotes);
        $this->assertNotSame('', $response->data->quotes[0]->original->text);
    }

    public function testSearch(): void
    {
        $client = QuotesClient::create();

        $response = $client->search(new SearchRequest('knowledge'));

        $this->assertSame(200, $response->code);
        $this->assertSame('knowledge', $response->data->query);
        $this->assertNotEmpty($response->data->results);
        $this->assertSame('quote', $response->data->results[0]->type);
        $this->assertNotEmpty($response->data->results[0]->matched_in);
    }
}
