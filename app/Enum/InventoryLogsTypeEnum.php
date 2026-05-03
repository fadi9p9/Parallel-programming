<?php

namespace App\Enum;

enum InventoryLogsTypeEnum: int
{
    case INCREASE = 1;
    case DECREASE = 2;
    case ADJUST = 3;
}