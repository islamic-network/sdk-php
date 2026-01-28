<?php

declare(strict_types=1);

namespace IslamicNetwork\AlQuran\DTO\Meta;

final class MetaData
{
    public function __construct(
        public readonly MetaCount $ayahs,
        public readonly MetaSurahSection $surahs,
        public readonly MetaSajdaSection $sajdas,
        public readonly MetaSection $rukus,
        public readonly MetaSection $pages,
        public readonly MetaSection $manzils,
        public readonly MetaSection $hizbQuarters,
        public readonly MetaSection $juzs,
    ) {
    }
}
