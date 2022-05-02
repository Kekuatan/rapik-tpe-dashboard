<?php

namespace App\Services\Ticket;

use App\Traits\Ticket\TicketQueryTrait;
use Illuminate\Support\Carbon;


class TicketService
{
    use TicketQueryTrait;

    private $dateTimeServer;

    public function __construct()
    {
        $this->dateTimeServer = Carbon::now();
    }

    public function dateTimeFormated(){
        return $this->dateTimeServer->format('d/m/Y H:i:s');
    }

    public function getDateTime(){
        return $this->dateTimeServer;
    }

    public function dateTimeBarcode(){
        return $this->dateTimeServer->format('YmdHis');
    }

    public function getPictureInName(){
        return self::barcodeNumber();
    }

    public function barcodeNumber($areaPositon){
        $no = self::dateTimeBarcode() . $areaPositon->code;
        return $no;
    }
}
