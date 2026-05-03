<?php

namespace App\Enum;

enum InventoryLogsSourceTypeEnum: int
{
    case ORDER = 1;
    case RETURN = 2;
    case MANUAL = 3;
    case ADJUSTMENT = 4;
}