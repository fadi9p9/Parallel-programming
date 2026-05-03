<?php

namespace App\Enum;

enum ProductAttributesTypeEnum: int
{
    case TEXT = 1;
    case NUMBER = 2;
    case BOOLEAN = 3;
    case SELECT = 4;
    case MULTI_SELECT = 5;
    case COLOR = 6;
}