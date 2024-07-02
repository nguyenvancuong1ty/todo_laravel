<?php

namespace App\Enums;

enum SexEnum: string
{
    case Male = 'male';
    case Female = 'female';
    case Other = 'other';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
