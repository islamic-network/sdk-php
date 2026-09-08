<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Unit;

use IslamicNetwork\AlAdhan\Enums\ContentEncoding as AlAdhanEncoding;
use IslamicNetwork\AlAdhan\Enums\GeocodingProvider;
use IslamicNetwork\AlAdhan\Requests\PrayerTimes\PrayerTimesOptions;
use IslamicNetwork\AlQuran\Enums\ContentEncoding as AlQuranEncoding;
use IslamicNetwork\AlQuran\Requests\Sections\SectionOptions;
use PHPUnit\Framework\TestCase;

final class RequestOptionsTest extends TestCase
{
    public function testPrayerTimesOptionsHeaders(): void
    {
        $options = new PrayerTimesOptions(acceptEncoding: AlAdhanEncoding::GZIP);

        $this->assertSame(['Accept-Encoding' => 'gzip'], $options->toHeaders());
    }

    public function testGeocodingCredentialsAreSentAsAPair(): void
    {
        $options = new PrayerTimesOptions(
            geocodingProvider: GeocodingProvider::HERE,
            geocodingKey: 'my-here-key'
        );

        $this->assertSame(
            ['geocodingProvider' => 'here', 'geocodingKey' => 'my-here-key'],
            $options->toQuery()
        );
    }

    /**
     * The API answers 400 to a provider without a key, so sending half a pair
     * would only turn a caller's mistake into a failed request.
     */
    public function testHalfAPairIsNotSent(): void
    {
        $this->assertSame([], (new PrayerTimesOptions(geocodingProvider: GeocodingProvider::GOOGLE))->toQuery());
        $this->assertSame([], (new PrayerTimesOptions(geocodingKey: 'orphan-key'))->toQuery());
        $this->assertSame([], (new PrayerTimesOptions())->toQuery());
    }

    public function testSectionOptionsQuery(): void
    {
        $options = new SectionOptions(offset: 3, limit: 10, acceptEncoding: AlQuranEncoding::ZSTD);

        $this->assertSame(['offset' => 3, 'limit' => 10], $options->toQuery());
        $this->assertSame(['Accept-Encoding' => 'zstd'], $options->toHeaders());
    }
}
