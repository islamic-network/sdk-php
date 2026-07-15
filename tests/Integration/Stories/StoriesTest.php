<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\Stories;

use IslamicNetwork\Ilm\Requests\PaginationOptions;
use IslamicNetwork\Stories\Requests\Assets\AssetRequest;
use IslamicNetwork\Stories\Requests\Search\SearchRequest;
use IslamicNetwork\Stories\Requests\Stories\StoriesRequest;
use IslamicNetwork\Stories\Requests\Stories\StoryRequest;
use IslamicNetwork\Stories\Requests\Tags\TagsRequest;
use IslamicNetwork\Stories\StoriesClient;
use PHPUnit\Framework\TestCase;

final class StoriesTest extends TestCase
{
    public function testStories(): void
    {
        $client = StoriesClient::create();

        $response = $client->stories(new StoriesRequest(options: new PaginationOptions(limit: 3)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotNull($response->meta);
        $this->assertGreaterThanOrEqual(1, $response->meta->total);
        $this->assertSame(3, $response->meta->limit);
        $this->assertNotEmpty($response->data);
        $this->assertMatchesRegularExpression('/^\d{4}-\d{2}-\d{2}$/', $response->data[0]->published);
        $this->assertArrayHasKey('en', $response->data[0]->title);
    }

    public function testStory(): void
    {
        $client = StoriesClient::create();

        $list = $client->stories(new StoriesRequest(options: new PaginationOptions(limit: 1)));
        $this->assertNotEmpty($list->data);

        $slug = $list->data[0]->slug;
        $response = $client->story(new StoryRequest($slug));

        $this->assertSame(200, $response->code);
        $this->assertSame($slug, $response->data->slug);
        $this->assertArrayHasKey('en', $response->data->title);
        $this->assertNotNull($response->data->body);
    }

    public function testTags(): void
    {
        $client = StoriesClient::create();

        $response = $client->tags(new TagsRequest());

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->data);
        $this->assertNotSame('', $response->data[0]->slug);
        $this->assertNotSame('', $response->data[0]->name);
        $this->assertGreaterThanOrEqual(1, $response->data[0]->stories);
        $this->assertStringContainsString('?tag=', $response->data[0]->url);
    }

    public function testAsset(): void
    {
        $client = StoriesClient::create();

        $stories = $client->stories(new StoriesRequest(options: new PaginationOptions(limit: 200)));

        $imageId = null;
        foreach ($stories->data as $story) {
            if ($story->image !== null) {
                $imageId = $story->image->id;
                break;
            }
        }

        if ($imageId === null) {
            $this->markTestSkipped('No story with an image in the live corpus.');
        }

        $asset = $client->asset(new AssetRequest($imageId));

        $this->assertStringStartsWith('image/', $asset->contentType);
        $this->assertNotSame('', $asset->body);
    }

    public function testSearch(): void
    {
        $client = StoriesClient::create();

        $response = $client->search(new SearchRequest('forgotten'));

        $this->assertSame(200, $response->code);
        $this->assertSame('forgotten', $response->data->query);
        $this->assertNotEmpty($response->data->results);
        $this->assertSame('story', $response->data->results[0]->type);
        $this->assertNotEmpty($response->data->results[0]->matched_in);
    }
}
