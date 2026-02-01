<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\BoycottIsraeli;

use IslamicNetwork\BoycottIsraeli\BoycottIsraeliClient;
use IslamicNetwork\BoycottIsraeli\Requests\Categories\CategoriesRequest;
use IslamicNetwork\BoycottIsraeli\Requests\Categories\CategoryCompaniesRequest;
use IslamicNetwork\BoycottIsraeli\Requests\PaginationOptions;
use PHPUnit\Framework\TestCase;

final class CategoriesTest extends TestCase
{
    public function testCategories(): void
    {
        $client = BoycottIsraeliClient::create();

        $response = $client->categories(new CategoriesRequest(new PaginationOptions(limit: 5)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }

    public function testCategoryCompanies(): void
    {
        $client = BoycottIsraeliClient::create();

        $categories = $client->categories(new CategoriesRequest(new PaginationOptions(limit: 1)));
        $this->assertNotEmpty($categories->data);

        $slug = $categories->data[0]->slug;

        $response = $client->categoryCompanies(new CategoryCompaniesRequest($slug, new PaginationOptions(limit: 1)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }
}
