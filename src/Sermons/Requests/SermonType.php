<?php

declare(strict_types=1);

namespace IslamicNetwork\Sermons\Requests;

enum SermonType: string
{
    case Friday = 'friday';
    case Other = 'other';
}
