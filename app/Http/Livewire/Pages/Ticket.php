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


    public $input = [];
    public $sumTotalRecord = 0;
    protected $listeners = ['changeQuery'];



    public function mount()
    {
        $this->startDate = '2021-09-07';
        $this->vehicle = 'all';
        $this->bank = 'all';
        $this->location = 'all';
        $this->endDate = Carbon::now()->format('Y-m-d');
        $this->input['startDate'] = $this->startDate;
        $this->input['endDate'] = Carbon::now()->format('Y-m-d');

    }

    public function dataChart(){
        $where = $this->setWhere();

        $data = $this->queryReportTicketPerDate(
            [
                Carbon::now()->firstOfMonth()->format('Y-m-d'),
                Carbon::now()->lastOfMonth()->format('Y-m-d')
            ], $where);
        $formatData = [];
        $days = ['01','02','03','04','05','06','07','08','09','10','11','12','13','14'
            ,'15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];
        $endDate = Carbon::now()->lastOfMonth()->format('d');
        $formatMonth = Carbon::now()->lastOfMonth()->format('m-Y');
        $stoper = false;
        $labels = [];

        foreach ($days as $day){
            if(!$stoper){
                $currentData = collect($data)->where('date', '==', $day);
                $labels[] = $day;
                $formatData[] =  !blank($currentData )? $currentData->values()->first()->total_amount: 0;
                if ($day == $endDate ){
                    $stoper = true;
                }
            }
        }

        return ['labels' => $labels, 'data' => $formatData, 'sum' => collect($data)->sum('total_amount')];
    }

    public function render()
    {
        $tableData = $this->getData();
        $where = $this->setWhere();
        $reportVehicle = $this->querySumAndGroupBy(['jenis_kend'], [$this->startDate, $this->endDate], $where);

        $this->sumTotalRecord = collect($reportVehicle)->sum('total_record');
        return view('livewire.pages.ticket', [
            'reportVehicle' => $reportVehicle,
            'reportBank' => $this->querySumAndGroupBy(['bank'], [$this->startDate, $this->endDate], $where),
            'showingPage' => $tableData->perPage() * $tableData->currentPage(),
            'totalPage' => \App\Models\Ticket::count(),
            'sumTotalRecord' => collect($reportVehicle)->sum('total_record'),
            'sumTotalAmount' => collect($reportVehicle)->sum('total_amount'),
            'dataChart' =>$this->dataChart()
        ]);
    }

    public function changeQuery($input)
    {
        $this->input = $input;
        $this->startDate = $this->input['startDate'];
        $this->endDate = $this->input['endDate'];
        $this->location = $this->input['location'] ?? 'all';
        $this->vehicle = $this->input['vehicle'] ?? 'all';
        $this->bank = $this->input['bank'] ?? 'all';
        $this->render();
    }

    public function dehydrate()
    {
        $this->emitTo('components.boxes.vehicle-box', 'dataBox', $this->input);
        $this->emitTo('components.tables.monthly-report-transaction', 'dataTable', $this->input);
        $this->emitTo('components.tables.daily-report-transaction', 'dataTable', $this->input);
        $this->emitTo('components.tables.yearly-report-transaction', 'dataTable', $this->input);
        $this->emitTo('components.tables.data-transaction', 'dataTable', $this->input);
    }

    public function downloadPdf()
    {
        $this->resetPage();
        $where = $this->setWhere();
        $reportVehicle = $this->querySumAndGroupBy(['jenis_kend'], [$this->startDate, $this->endDate], $where);


        $this->sumTotalRecord = collect($reportVehicle)->sum('total_record');
        $html = view('converts.pdf.report', [
            'reportVehicle' => $reportVehicle,
            'reportBank' => $this->querySumAndGroupBy(['bank'], [$this->startDate, $this->endDate], $where),
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
