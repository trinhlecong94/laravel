<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Role extends Enum
{
    const ROLE_USER =   0;
    const ROLE_SELLER =   1;
    const ROLE_ADMIN = 2;
}
