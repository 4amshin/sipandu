<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendudukExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function title(): string
    {
        return 'Data Penduduk';
    }
    public function collection()
    {
        $nomorUrut = 1;
        $daftarPenduduk = Penduduk::all();

        return $daftarPenduduk->map(function ($penduduk) use (&$nomorUrut) {
            return [
                'No' => $nomorUrut++,
                'NIK' => $penduduk->nik,
                'NO KK' => $penduduk->no_kk,
                'Nama' => $penduduk->nama,
                'Jenis Kelamin' => $penduduk->jenis_kelamin,
                'Tempat Tanggal Lahir' => $penduduk->tempat_lahir . ', ' .
                    \Carbon\Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y'),
                'Agama' => $penduduk->agama,
                'Status Pernikahan' => $penduduk->status_pernikahan,
                'Pekerjaan' => $penduduk->pekerjaan,
                'Alamat' => 'Dusun ' . $penduduk->dusun . ', ' . 'RT' . $penduduk->rt . '/RW' . $penduduk->rw,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'NO KK',
            'Nama',
            'Jenis Kelamin',
            'Tempat Tanggal Lahir',
            'Agama',
            'Status Pernikahan',
            'Pekerjaan',
            'Alamat',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        //inisialisasi daftar nama column yang ingin diberi style yang sama
        $daftarColumn = ['A', 'B', 'C', 'E', 'F', 'G', 'H', 'I', 'J'];

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

        //style untuk column 'D'
        $styles['D'] = [
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
            'C' => 20,
            'D' => 25,
            'E' => 15,
            'F' => 30,
            'G' => 15,
            'H' => 17,
            'I' => 18,
            'J' => 27,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
