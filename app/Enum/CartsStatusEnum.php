<?php

namespace App\Enum;

enum CartsStatusEnum: int
{
    case ACTIVE = 1;
    case ABANDONED = 2;
    case CONVERTED = 3;
    case EXPIRED = 4;
}