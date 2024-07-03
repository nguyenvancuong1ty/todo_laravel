<?php

namespace App\Enums;

enum StatusEnum: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Pending = 'pending';
    case Suspended = 'suspended';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
