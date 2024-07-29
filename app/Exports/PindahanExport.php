<?php

namespace App\Exports;

use App\Models\Pindahan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PindahanExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function title(): string
    {
        return 'Data Pendatang';
    }
    public function collection()
    {
        $nomorUrut = 1;
        $daftarPindahan = Pindahan::all();

        return $daftarPindahan->map(function ($pindahan) use (&$nomorUrut) {
            return [
                'No' => $nomorUrut++,
                'NIK' => $pindahan->nik,
                'Nama' => $pindahan->nama,
                'Jenis Kelamin' => $pindahan->jenis_kelamin,
                'Tanggal Pindah' => \Carbon\Carbon::parse($pindahan->tanggal_pindah)->translatedFormat('d F Y'),
                'Alasan Pindah' => $pindahan->alasan_pindah,

            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama',
            'Jenis Kelamin',
            'Tanggal Pindah',
            'Alasan Pindah',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        //inisialisasi daftar nama column yang ingin diberi style yang sama
        $daftarColumn = ['A', 'B', 'D', 'E', 'F',];

        //inisialisasi styel rataTengah
        $rateTengah = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ]
        ];

        //inisialisasi array
        $styles = [];

        //implementasikan style rataTengah ke daftarColumn menggunakan Loop
        foreach ($daftarColumn as $column) {
            $styles[$column] = $rateTengah;
        }

        //style untuk row '1'
        $styles[1] = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ];

        //style
        $styles['C'] = [
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ]
        ];

        return $styles;
    }


    //Fungsi untuk mengatur lebar cell
    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 20,
            'C' => 25,
            'D' => 15,
            'E' => 25,
            'F' => 30,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
