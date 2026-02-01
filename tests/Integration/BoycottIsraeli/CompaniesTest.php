<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Integration\BoycottIsraeli;

use IslamicNetwork\BoycottIsraeli\BoycottIsraeliClient;
use IslamicNetwork\BoycottIsraeli\Requests\Companies\CompaniesRequest;
use IslamicNetwork\BoycottIsraeli\Requests\Companies\CompanyRequest;
use IslamicNetwork\BoycottIsraeli\Requests\PaginationOptions;
use PHPUnit\Framework\TestCase;

final class CompaniesTest extends TestCase
{
    public function testCompanies(): void
    {
        $client = BoycottIsraeliClient::create();

        $response = $client->companies(new CompaniesRequest(new PaginationOptions(limit: 2)));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
    }

    public function testCompanyById(): void
    {
        $client = BoycottIsraeliClient::create();

        $companies = $client->companies(new CompaniesRequest(new PaginationOptions(limit: 1)));
        $this->assertNotEmpty($companies->data);

        $id = $companies->data[0]->id;

        $response = $client->company(new CompanyRequest($id));

        $this->assertSame(200, $response->code);
        $this->assertSame('OK', $response->status);
        $this->assertNotEmpty($response->data);
        $this->assertSame($id, $response->data[0]->id);
    }
}
