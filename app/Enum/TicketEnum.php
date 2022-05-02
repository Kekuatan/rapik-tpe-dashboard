<?php

namespace App\Enum;

use Carbon\Carbon;

class TicketEnum
{

    const LOCATIONS = [
        'all' => 'Semua lokasi',
        '00170302' => '00170302',
        '06012200' => '06012200',
        '01' => '01',
        '00170301' => '00170301',
    ];

    const VEHICLES = [
        'all' => 'Semua Kendaraan',
        'A' => 'mobil',
        'B' => 'truk',
        'C' => 'motor',
    ];

    const BANKS = [
        'all' => 'Semua bank',
        '0' => 'e-Money',
        '3' => 'TapCash',
        'q' => 'QR code',
    ];

    public static function getVehicleName($id) {
        $names = self::VEHICLES;
        return $names[$id] ?? 'undefined';
    }

    public static function getLocationName($id) {
        $names = self::LOCATIONS;
        return $names[$id] ?? 'undefined';
    }

    public static function getIconVehicle($id) {
        $names = [
            'mobil' => 'car',
            'truk' => 'truck',
            'motor' => 'motorcycle',
        ];
        return $names[$id] ?? 'undefined';
    }


    public static function getStatusParkir($dateIn, $duration) {
        return Carbon::parseFromLocale($dateIn)->addHour($duration) > Carbon::now() ? 'aktif' : 'habis';
    }

    public static function getBankName($id) {
        $names = self::BANKS;
        return $names[$id]?? 'undefined';
    }
}
