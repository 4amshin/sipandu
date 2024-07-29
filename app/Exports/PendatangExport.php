<?php

namespace App\Exports;

use App\Models\Pendatang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendatangExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle, WithColumnFormatting
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
        $daftarPendatang = Pendatang::all();

        return $daftarPendatang->map(function ($pendatang) use (&$nomorUrut) {
            return [
                'No' => $nomorUrut++,
                'NIK' => $pendatang->nik,
                'Nama' => $pendatang->nama,
                'Jenis Kelamin' => $pendatang->jenis_kelamin,
                'Tanggal Datang' => \Carbon\Carbon::parse($pendatang->tanggal_datang)->translatedFormat('d F Y'),
                'Nama Pelapor' => $pendatang->nama_pelapor,
                'Alamat Pendatang' => $pendatang->alamat_pendatang,

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
            'Tanggal Datang',
            'Nama Pelapor',
            'Alamat Pendatang',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        //inisialisasi daftar nama column yang ingin diberi style yang sama
        $daftarColumn = ['A', 'B', 'D', 'E', 'F', 'G'];

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
            'F' => 20,
            'G' => 30,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
