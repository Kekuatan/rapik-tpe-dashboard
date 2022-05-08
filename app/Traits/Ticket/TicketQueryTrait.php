<?php

namespace App\Traits\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

trait TicketQueryTrait
{
    use WithPagination;
    public $tableData = null;
    public $startDate = null;
    public $endDate = null;
    public $location = 'all';
    public $vehicle = 'all';
    public $bank = 'all';

    public function queryFirst()
    {
        return Ticket::first();
    }

    private function setDate($date)
    {
        if (!blank($date)) {
            $date = [
                Carbon::parseFromLocale($date[0].'00:00:00'),
                Carbon::parseFromLocale($date[1].'23:59:59'),
            ];
        }
        return $date;
    }


    private function setWhere()
    {
        $location = $this->setLocation();
        $vehicle = $this->setVehicle();
        $bank = $this->setBank();

        $where = array_merge($location, $vehicle, $bank);
        return $where;
    }

    private function setLocation()
    {
        $location = [];
        if ($this->location != 'all') {
            $location[] = ['terminal_id', '=', $this->location];
        }
        return $location;
    }

    private function setVehicle()
    {
        $vehicle = [];
        if ($this->vehicle != 'all') {
            $vehicle[] = ['jenis_kend', '=', $this->vehicle];
        }
        return $vehicle;
    }

    private function setBank()
    {
        $bank = [];
        if ($this->bank != 'all') {
            $bank[] = ['bank', '=', $this->bank];
        }
        return $bank;
    }


    public function getData($perPage = 10)
    {

        $date = $this->setDate([$this->startDate, $this->endDate]);
        $where = $this->setWhere();
        $tickets = Ticket::whereBetween('tanggal', $date)
            ->when(!blank($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->orderBy('tanggal', 'DESC')->simplePaginate($perPage);
        return $tickets;
    }
    public function getDataCount($perPage = 10)
    {
        $date = $this->setDate([$this->startDate, $this->endDate]);
        $where = $this->setWhere();
        $tickets = Ticket::whereBetween('tanggal', $date)
            ->when(!blank($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->orderBy('tanggal', 'DESC')->count();
        return $tickets;
    }


    public function getReportDetail ($date, $where = []){

        $date = $this->setDate($date);
        return Ticket::whereBetween('tanggal', $date)
        ->when(!blank($where), function ($query) use ($where) {
            $query->where($where);
        })
            ->get();
    }

    public function queryReportTicketPerHour ($date =[], $where = [])
    {
        $date = $this->setDate($date);
        return Ticket::whereBetween('tanggal', $date)
            ->when(!blank($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->select(DB::raw(
                "
             extract(year from tanggal) as year,
                to_char(tanggal, 'mm') as month,
                to_char(tanggal, 'dd') as date,
                to_char(tanggal, 'HH24') as hour,
                terminal_id,
                     count(*) as total_record,
                     SUM(amount) as total_amount"
            ))
            ->orderBy('year', 'ASC')
            ->groupBy('year', 'month', 'date','hour','terminal_id')
            ->get();
    }

    public function queryReportTicketPerMounth ($date =[], $where = [])
    {
        $date = $this->setDate($date);
        return Ticket::whereBetween('tanggal', $date)
            ->when(!blank($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->select(DB::raw(
                "
             extract(year from tanggal) as year,
                to_char(tanggal, 'mm') as month,
                to_char(tanggal, 'dd') as date,
                jenis_kend,
                terminal_id,
                     count(*) as total_record,
                     SUM(amount) as total_amount"
            ))
            ->orderBy('year', 'ASC')
            ->groupBy('year', 'month', 'date','terminal_id','jenis_kend')
            ->get();
    }

    public function queryReportTicketPerYearEachMonth ($date =[], $where = [])
    {
        $date = $this->setDate($date);
        return Ticket::whereBetween('tanggal', $date)
            ->when(!blank($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->select(DB::raw(
                "
             extract(year from tanggal) as year,
                to_char(tanggal, 'mm') as month,
                jenis_kend,
                terminal_id,
                     count(*) as total_record,
                     SUM(amount) as total_amount"
            ))
            ->orderBy('year', 'ASC')
            ->groupBy('year', 'month','terminal_id','jenis_kend')
            ->get();
    }

    public function querySumAndGroupBy($groupBy, $date = [], $where = [])
    {

        $date = $this->setDate($date);
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
            ->when(!blank($date), function ($query) use ($date) {
                $query->whereBetween('tanggal', $date);
            })
            ->when(!blank($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->get();
    }

    public function queryReportTicketPerDate($date = [], $where = [])
    {

        $date = $this->setDate($date);
        return Ticket::when(!blank($date), function ($query) use ($date) {
            $query->whereBetween('tanggal', $date);
        })
            ->when(!blank($where), function ($query) use ($where) {
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
            ->groupBy('year', 'month', 'date')
            ->get();
    }

    public function queryReportTicketPerMonth($date = [], $where = [])
    {
        $date = $this->setDate($date);
        return Ticket::when(!blank($date), function ($query) use ($date) {
            $query->whereBetween('tanggal', $date);
        })
            ->when(!blank($where), function ($query) use ($where) {
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

    public function queryReportTicketPerYear($date = [], $where = [])
    {
        $date = $this->setDate($date);

        return Ticket::when(!blank($date), function ($query) use ($date) {
            $query->whereBetween('tanggal', $date);
        })
            ->when(!blank($where), function ($query) use ($where) {
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
