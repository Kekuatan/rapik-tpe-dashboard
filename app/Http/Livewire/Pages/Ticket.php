<?php

namespace App\Http\Livewire\Pages;

use App\Enum\ExternalLinkEnum;
use App\Enum\TicketEnum;
use App\Enums;
use App\Traits\Ticket\TicketQueryTrait;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Ticket extends Component
{
    use WithPagination;
    use TicketQueryTrait;

    public $tableData = null;
    public $startDate = null;
    public $endDate = null;
    public $location = null;
    public $input = [];
    public $sumTotalRecord = 0;

    public function mount()
    {
        $this->startDate = '2021-09-07 17:04:58';
        $this->vehicle = 'all';
        $this->bank = 'all';
        $this->location = 'all';
        $this->endDate = Carbon::now()->format('Y-m-d h:m:s');
        $this->input['startDate'] = $this->startDate;
        $this->input['endDate'] = Carbon::now()->format('Y-m-d h:m:s');
    }

    private function setWhere()
    {
        $location = $this->setLocation();
        $vehicle = $this->setVehicle();
        $bank = $this->setBank();

        $where = array_merge($location, $vehicle, $bank);
        return $where;
    }

    public function getData($perPage = 10)
    {
        $where = $this->setWhere();
        $tickets = \App\Models\Ticket::whereBetween('tanggal', [$this->startDate, $this->endDate])
            ->when(!blank($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->orderBy('tanggal', 'DESC')->simplePaginate($perPage);
        return $tickets;
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

    public function getReportVehicle()
    {
        $where = $this->setWhere();
        return $this->querySumAndGroupBy(['jenis_kend'], [$this->startDate, $this->endDate], $where);
    }

    public function getReportBank()
    {
        $where = $this->setWhere();
        return $this->querySumAndGroupBy(['bank'], [$this->startDate, $this->endDate], $where);
    }



    public function render()
    {
        $tableData = $this->getData();
        $where = $this->setWhere();
        $reportVehicle = $this->getReportVehicle();
        $this->sumTotalRecord = collect($reportVehicle)->sum('total_record');
        return view('livewire.pages.ticket', [
            'tickets' => $tableData,
            'reportVehicle' => $reportVehicle,
            'reportBank' => $this->getReportBank(),
            'showingPage' => $tableData->perPage() * $tableData->currentPage(),
            'totalPage' => \App\Models\Ticket::count(),
            'sumTotalRecord' => collect($reportVehicle)->sum('total_record'),
            'sumTotalAmount' => collect($reportVehicle)->sum('total_amount'),
            'locations' => TicketEnum::LOCATIONS,
            'vehicles' => TicketEnum::VEHICLES,
            'banks' => TicketEnum::BANKS,
            'reportTicketPerMonth'=>$this->queryReportTicketPerMonth([$this->startDate, $this->endDate], $where),
            'reportTicketPerYear'=>$this->queryReportTicketPerYear([$this->startDate, $this->endDate], $where),
            'reportTicketPerDate'=>$this->queryReportTicketPerDate([$this->startDate, $this->endDate], $where),
        ]);
    }

    public function changeDate()
    {
        $this->startDate = $this->input['startDate'];
        $this->endDate = $this->input['endDate'];
        $this->location = $this->input['location'] ?? 'all';
        $this->vehicle = $this->input['vehicle'] ?? 'all';
        $this->bank = $this->input['bank'] ?? 'all';
        $this->render();
    }


    public function downloadPdf()
    {
        $this->resetPage();
        $reportVehicle = $this->getReportVehicle();
        $where = $this->setWhere();

        $this->sumTotalRecord = collect($reportVehicle)->sum('total_record');
        $html = view('converts.pdf.report', [

            'reportVehicle' => $reportVehicle,
            'reportBank' => $this->getReportBank(),
            'showingPage' => collect($reportVehicle)->sum('total_record'),
            'sumTotalRecord' => collect($reportVehicle)->sum('total_record'),
            'sumTotalAmount' => collect($reportVehicle)->sum('total_amount'),
            'locations' => TicketEnum::LOCATIONS,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'vehicles' => TicketEnum::VEHICLES,
            'banks' => TicketEnum::BANKS,
            'reportTicketPerMonth'=>$this->queryReportTicketPerMonth([$this->startDate, $this->endDate], $where),
            'reportTicketPerYear'=>$this->queryReportTicketPerYear([$this->startDate, $this->endDate], $where),
            'reportTicketPerDate'=>$this->queryReportTicketPerDate([$this->startDate, $this->endDate], $where),
        ])->extends('layouts.app')->render();


        $client = new Client([
            'base_uri' => ExternalLinkEnum::PDFGENERATOR]);
        $response = $client->post('pdf-generator', [
            'form_params' => ['html' => $html]
        ]);

        $headers = array(
            'Content-Type: application/pdf',
        );


//        Storage::disk('public')->put('download-pdf/' . 'aaaa' . '.pdf', $response->getBody()->getContents());
//        return ['pdf_link' => Storage::disk('public')->url('download-pdf/' . 'aaaaa' . '.pdf')];

        return response()->streamDownload(function () use ($response) {
            echo $response->getBody()->getContents();
        }, 'Laporan.pdf');
    }
}
