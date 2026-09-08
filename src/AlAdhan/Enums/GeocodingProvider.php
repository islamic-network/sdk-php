<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Enums;

enum GeocodingProvider: string
{
    case HERE = 'here';
    case GOOGLE = 'google';
}
