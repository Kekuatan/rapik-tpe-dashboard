<?php

namespace App\Models;

use App\Enum\TicketEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $connection = 'rapik';

    protected $table = 'transaksi';
    protected $appends = ['status'];

    public function getStatusAttribute()
    {
        return TicketEnum::getStatusParkir($this->tanggal,$this->durasi);
    }

    public function getJenisKendAttribute($value)
    {
        return TicketEnum::getVehicleName($value);
    }
    public function getBankAttribute($value)
    {
        return TicketEnum::getBankName($value);
    }

}
