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
        $cant = count($this->toExport);
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getStyle("A1:F{$cant}")->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle($cant)->getFont()->setSize(12)->setBold(true);

        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            // Styling a specific cell by coordinate.
            //'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'F'  => ['font' => ['bold' => true]],
        ];
    }
}
