<?php

namespace App\Exports;

use App\Models\Kelahiran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KelahiranExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle
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
        $daftarKelahiran = Kelahiran::all();

        return $daftarKelahiran->map(function ($kelahiran) use (&$nomorUrut) {
            return [
                'No' => $nomorUrut++,
                'Nama' => $kelahiran->nama,
                'Jenis Kelamin' => $kelahiran->jenis_kelamin,
                'Tempat Tanggal Lahir' => $kelahiran->tempat_lahir.', '. \Carbon\Carbon::parse($kelahiran->tanggal_lahir)->translatedFormat('d F Y'),
                'Jam Lahir' => $kelahiran->jam_lahir,
                'Nama Ayah' => $kelahiran->nama_ayah,
                'Nama Ibu' => $kelahiran->nama_ibu,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Jenis Kelamin',
            'Tempat Tanggal Lahir',
            'Jam Lahir',
            'Nama Ayah',
            'Nama Ibu'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        //inisialisasi daftar nama column yang ingin diberi style yang sama
        $daftarColumn = ['A', 'C', 'D', 'E', 'F', 'G'];

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
        $styles['B'] = [
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
            'B' => 25,
            'C' => 15,
            'D' => 35,
            'E' => 17,
            'F' => 20,
            'G' => 20,
        ];
    }
}
