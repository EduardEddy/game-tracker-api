<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TrackerExport implements FromArray, WithStyles
{
    protected $toExport;
    public function __construct(Array $toExport)
    {
        $this->toExport = $toExport;
    }

    public function array(): array
    {
        return $this->toExport;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            //'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'E'  => ['font' => ['bold' => true]],
        ];
    }
}
