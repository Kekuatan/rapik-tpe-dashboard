<?php

namespace App\Enum;

class UserEnum
{
    const LEVEL_ADMIN = 1;
    const LEVEL_KARYAWAN = 2;
    const LEVEL_MANAGEMENT = 3;

    public static function getLevelName($code)
    {
        switch ($code) {
            case self::LEVEL_ADMIN;
                return 1;
            case self::LEVEL_KARYAWAN;
                return 2;
            case self::LEVEL_MANAGEMENT;
                return 3;
            default:
                return '';
        }
    }
}
