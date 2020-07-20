<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    const PENDING =    0;
    const ORDERED =    1;
    const PROCESSING = 2;
    const COMPLETED =  4;
    const CANCELLED =  5;
    const DECLINED =   6;
}
