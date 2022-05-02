<?php

namespace App\Traits\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

trait TicketQueryTrait
{
    public function queryFirst()
    {
        return Ticket::first();
    }

    private function setDate ($date){
        if (!blank($date)) {
            $date = [
                Carbon::parseFromLocale($date[0]),
                Carbon::parseFromLocale($date[1]),
            ];
        }
        return $date;
    }
    public function querySumAndGroupBy($groupBy, $date =[], $where = [])
    {

        $date =$this->setDate($date);

//            ->where([
//                ['active', '=', 1],
//                ['is_ban', '=', 0]
//            ])

        $group = [
            DB::raw("SUM(amount) as total_amount"),
            DB::raw("count(*) as total_record")
        ];

        foreach ($groupBy as $item) {
            $group[] = DB::raw($item);
        }

        return Ticket::select($group)
            ->when(in_array('terminal_id', $groupBy), function ($query) {
                $query->groupBy('terminal_id');
            })
            ->when(in_array('jenis_kend', $groupBy), function ($query) {
                $query->groupBy('jenis_kend');
            })
            ->when(in_array('bank', $groupBy), function ($query) {
                $query->groupBy('bank');
            })
            ->when(!blank($date), function ($query) use($date) {
                $query->whereBetween('tanggal', $date);
            })
            ->when(!blank($where), function ($query) use($where) {
                $query->where($where);
            })
            ->get();
    }

    public function queryReportTicketPerDate( $date =[], $where = []){

        $date =$this->setDate($date);
        return Ticket::when(!blank($date), function ($query) use($date) {
                $query->whereBetween('tanggal', $date);
            })
            ->when(!blank($where), function ($query) use($where) {
                $query->where($where);
            })->select(DB::raw(
            "
             extract(year from tanggal) as year,
                to_char(tanggal, 'mm') as month,
                to_char(tanggal, 'dd') as date,
                     count(*) as total_record,
                     SUM(amount) as total_amount"
        ))
            ->orderBy('year', 'ASC')
            ->groupBy('year', 'month','date')
            ->get();
    }

    public function queryReportTicketPerMonth( $date =[], $where = []){
        $date =$this->setDate($date);
        return Ticket::when(!blank($date), function ($query) use($date) {
            $query->whereBetween('tanggal', $date);
        })
            ->when(!blank($where), function ($query) use($where) {
                $query->where($where);
            })->select(DB::raw(
            "
             extract(year from tanggal) as year,
                to_char(tanggal, 'mm') as month,
                     count(*) as total_record,
                     SUM(amount) as total_amount"
        ))
            ->orderBy('year', 'ASC')
            ->groupBy('year', 'month')
            ->get();
    }

    public function queryReportTicketPerYear( $date =[], $where = []){
        $date =$this->setDate($date);
        return Ticket::when(!blank($date), function ($query) use($date) {
            $query->whereBetween('tanggal', $date);
        })
            ->when(!blank($where), function ($query) use($where) {
                $query->where($where);
            })->select(DB::raw(
            "
             extract(year from tanggal) as year,
                     count(*) as total_record,
                     SUM(amount) as total_amount"
        ))
            ->orderBy('year', 'ASC')
            ->groupBy('year')
            ->get();
    }
}
