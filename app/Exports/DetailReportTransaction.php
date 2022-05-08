<?php

namespace App\Exports;

use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DetailReportTransaction implements FromView, WithColumnWidths, WithStyles
{
    public $data = [];
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 20,
            'J' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size' =>11]],
            8    => ['font' => ['bold' => true]],
            9    => ['font' => ['bold' => true]],
//
//            // Styling a specific cell by coordinate.
//            'B2' => ['font' => ['italic' => true]],
//
//            // Styling an entire column.
//            'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function view(): View
    {

        return view('converts.exel.detail-report-transaction',$this->data);
    }
}
