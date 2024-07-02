<?php

namespace App\Enums;

enum StatusEnum: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Pending = 'pending';
    case Suspended = 'suspended';
}
