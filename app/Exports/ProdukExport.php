<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;

class ProdukExport implements FromCollection, WithHeadings, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produk::all();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setWidth(5);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setWidth(35);
                $event->sheet->getColumnDimension('D')->setWidth(35);

                // judul atas
                $event->sheet->insertNewRowBefore(1, 3);
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->mergeCells('A2:D2');
                $event->sheet->setCellValue('A1', "Data Produk di Market");
                $event->sheet->setCellValue('A2', "PER TANGGAL " .date('d M Y'));

                // style
                $event->sheet->getStyle('A1:B2')->getFont()->setBold(true);
                $event->sheet->getStyle('A1:B2')->getAlignment()->setHorizontal
                (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A4:B5')->getAlignment()->setHorizontal
                (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('C4:D5')->getAlignment()->setHorizontal
                (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A5:B6')->getAlignment()->setHorizontal
                (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('C5:D6')->getAlignment()->setHorizontal
                (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A4:D4')->getFont()->setBold(true);


                // Border
                $event->sheet->getStyle('A4:D' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => [ 'rgb' => '0000FF'],
                        ],
                    ]
                    ]);
            }
        ];
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama Produk',
            'Created At',
            'Updated At'
        ];
    }
    public function title(): string
    {
        return 'Data';  
    }

    
}
