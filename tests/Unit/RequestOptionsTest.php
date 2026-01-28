<?php

declare(strict_types=1);

namespace IslamicNetwork\Tests\Unit;

use IslamicNetwork\AlAdhan\Enums\ContentEncoding as AlAdhanEncoding;
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

    public function testSectionOptionsQuery(): void
    {
        $options = new SectionOptions(offset: 3, limit: 10, acceptEncoding: AlQuranEncoding::ZSTD);

        $this->assertSame(['offset' => 3, 'limit' => 10], $options->toQuery());
        $this->assertSame(['Accept-Encoding' => 'zstd'], $options->toHeaders());
    }
}
