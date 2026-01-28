<?php

declare(strict_types=1);

namespace IslamicNetwork\AlAdhan\Enums;

enum CalendarMethod: string
{
    case HJCOSA = 'HJCoSA';
    case UAQ = 'UAQ';
    case DIYANET = 'DIYANET';
    case MATHEMATICAL = 'MATHEMATICAL';
}
