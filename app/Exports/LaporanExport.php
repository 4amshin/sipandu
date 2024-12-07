<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle, WithColumnFormatting
{
    protected $laporan;
    protected $dusunList;

    public function __construct($laporan, $dusunList)
    {
        $this->laporan = $laporan;
        $this->dusunList = $dusunList;
    }

    public function collection()
    {
        $nomorUrut = 1;
        $data = collect();

        foreach ($this->dusunList as $dusun) {
            $data->push([
                'No' => $nomorUrut++,
                'Dusun' => $dusun,
                'KK L' => $this->laporan['jumlahKK']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah'),
                'KK P' => $this->laporan['jumlahKK']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah'),
                'KK Total' => $this->laporan['jumlahKK']->where('dusun', $dusun)->sum('jumlah'),
                'Jumlah Rumah' => $this->laporan['jumlahKK']->where('dusun', $dusun)->sum('jumlah'),
                'Penduduk Awal L' => $this->laporan['pendudukAwal']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah'),
                'Penduduk Awal P' => $this->laporan['pendudukAwal']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah'),
                'Penduduk Awal Total' => $this->laporan['pendudukAwal']->where('dusun', $dusun)->sum('jumlah'),
                'Lahir L' => $this->laporan['lahir']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah'),
                'Lahir P' => $this->laporan['lahir']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah'),
                'Lahir Total' => $this->laporan['lahir']->where('dusun', $dusun)->sum('jumlah'),
                'Meninggal L' => $this->laporan['meninggal']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah'),
                'Meninggal P' => $this->laporan['meninggal']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah'),
                'Meninggal Total' => $this->laporan['meninggal']->where('dusun', $dusun)->sum('jumlah'),
                'Pendatang L' => $this->laporan['pendatang']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah'),
                'Pendatang P' => $this->laporan['pendatang']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah'),
                'Pendatang Total' => $this->laporan['pendatang']->where('dusun', $dusun)->sum('jumlah'),
                'Pindahan L' => $this->laporan['pindahan']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah'),
                'Pindahan P' => $this->laporan['pindahan']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah'),
                'Pindahan Total' => $this->laporan['pindahan']->where('dusun', $dusun)->sum('jumlah'),
                'Penduduk Akhir L' => $this->laporan['pendudukAkhir']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah'),
                'Penduduk Akhir P' => $this->laporan['pendudukAkhir']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah'),
                'Penduduk Akhir Total' => $this->laporan['pendudukAkhir']->where('dusun', $dusun)->sum('jumlah'),
                'Keterangan' => '-',
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Dusun',
            'KK L',
            'KK P',
            'KK Total',
            'Jumlah Rumah',
            'Penduduk Awal L',
            'Penduduk Awal P',
            'Penduduk Awal Total',
            'Lahir L',
            'Lahir P',
            'Lahir Total',
            'Meninggal L',
            'Meninggal P',
            'Meninggal Total',
            'Pendatang L',
            'Pendatang P',
            'Pendatang Total',
            'Pindahan L',
            'Pindahan P',
            'Pindahan Total',
            'Penduduk Akhir L',
            'Penduduk Akhir P',
            'Penduduk Akhir Total',
            'Keterangan',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Mengatur header menjadi bold dan center
        $sheet->getStyle('A1:Z1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ]);

        // Mengatur lebar kolom agar sesuai konten
        foreach (range('A', 'Z') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
    }

    public function columnWidths(): array
    {
        return [];
    }

    public function columnFormats(): array
    {
        return [];
    }

    public function title(): string
    {
        return 'Laporan Penduduk';
    }
}
