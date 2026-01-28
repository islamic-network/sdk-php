<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Enums;

enum ContentEncoding: string
{
    case GZIP = 'gzip';
    case ZSTD = 'zstd';
}
