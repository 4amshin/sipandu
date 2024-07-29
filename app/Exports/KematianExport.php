<?php

namespace App\Exports;

use App\Models\Kematian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KematianExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function title(): string
    {
        return 'Data Kelahiran';
    }
    public function collection()
    {
        $nomorUrut = 1;
        $daftarKematian = Kematian::all();

        return $daftarKematian->map(function ($kematian) use (&$nomorUrut) {
            return [
                'No' => $nomorUrut++,
                'NIK' => $kematian->nik,
                'Nama' => $kematian->nama,
                'Jenis Kelamin' => $kematian->jenis_kelamin,
                'Tempat Tanggal Kematian' => $kematian->tempat_kematian . ', ' . \Carbon\Carbon::parse($kematian->tanggal_kematian)->translatedFormat('d F Y'),
                'Jam Kematian' => $kematian->jam_kematian,
                'Sebab' => $kematian->sebab,
                'Nama Ayah' => $kematian->nama_ayah,
                'Nama Ibu' => $kematian->nama_ibu,
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
            'Tempat Tanggal Kematian',
            'Jam Kematian',
            'Sebab',
            'Nama Ayah',
            'Nama Ibu'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        //inisialisasi daftar nama column yang ingin diberi style yang sama
        $daftarColumn = ['A', 'B', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

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
            'E' => 30,
            'F' => 17,
            'G' => 20,
            'H' => 20,
            'I' => 20,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER, // Mengatur kolom B (NIK) menjadi format teks
        ];
    }
}
