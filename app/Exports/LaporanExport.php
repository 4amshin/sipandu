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

    protected $bulan;
    protected $tahun;

    public function __construct($laporan, $dusunList, $bulan, $tahun)
    {
        $this->laporan = $laporan;
        $this->dusunList = $dusunList;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        $nomorUrut = 1;
        $data = collect();

        foreach ($this->dusunList as $dusun) {
            $data->push([
                'No' => $nomorUrut++,
                'Dusun' => $dusun,
                'KK L' => $this->laporan['jumlahKK']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') ?? 0,
                'KK P' => $this->laporan['jumlahKK']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') ?? 0,
                'KK Total' => $this->laporan['jumlahKK']->where('dusun', $dusun)->sum('jumlah') ?? 0,
                'Jumlah Rumah' => $this->laporan['jumlahKK']->where('dusun', $dusun)->sum('jumlah') ?? 0,
                'Penduduk Awal L' => $this->laporan['pendudukAwal']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') ?? 0,
                'Penduduk Awal P' => $this->laporan['pendudukAwal']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') ?? 0,
                'Penduduk Awal Total' => $this->laporan['pendudukAwal']->where('dusun', $dusun)->sum('jumlah'),
                'Lahir L' => $this->laporan['lahir']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') ?? 0,
                'Lahir P' => $this->laporan['lahir']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') ?? 0,
                'Lahir Total' => $this->laporan['lahir']->where('dusun', $dusun)->sum('jumlah') ?? 0,
                'Meninggal L' => $this->laporan['meninggal']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') ?? 0,
                'Meninggal P' => $this->laporan['meninggal']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') ?? 0,
                'Meninggal Total' => $this->laporan['meninggal']->where('dusun', $dusun)->sum('jumlah') ?? 0,
                'Pendatang L' => $this->laporan['pendatang']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') ?? 0,
                'Pendatang P' => $this->laporan['pendatang']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') ?? 0,
                'Pendatang Total' => $this->laporan['pendatang']->where('dusun', $dusun)->sum('jumlah') ?? 0,
                'Pindahan L' => $this->laporan['pindahan']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') ?? 0,
                'Pindahan P' => $this->laporan['pindahan']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') ?? 0,
                'Pindahan Total' => $this->laporan['pindahan']->where('dusun', $dusun)->sum('jumlah') ?? 0,
                'Penduduk Akhir L' => $this->laporan['pendudukAkhir']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') ?? 0,
                'Penduduk Akhir P' => $this->laporan['pendudukAkhir']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') ?? 0,
                'Penduduk Akhir Total' => $this->laporan['pendudukAkhir']->where('dusun', $dusun)->sum('jumlah') ?? 0,
                'Keterangan' => '-',
            ]);
        }
        // Jumlah Total Jumlah KK
        $totalKKL = $this->laporan['jumlahKK']->where('jenis_kelamin', 'laki-laki')->sum('jumlah');
        $totalKKP = $this->laporan['jumlahKK']->where('jenis_kelamin', 'perempuan')->sum('jumlah');
        $totalKKTotal = $this->laporan['jumlahKK']->sum('jumlah');

        // Jumlah Total Jumlah Rumah
        $totalJumlahRumah = $this->laporan['jumlahKK']->sum('jumlah');

        // Jumlah Total Penduduk Awal
        $totalPendudukAwalL = $this->laporan['pendudukAwal']->where('jenis_kelamin', 'laki-laki')->sum('jumlah');
        $totalPendudukAwalP = $this->laporan['pendudukAwal']->where('jenis_kelamin', 'perempuan')->sum('jumlah');
        $totalPendudukAwalTotal = $this->laporan['pendudukAwal']->sum('jumlah');

        // Jumlah Total Lahir Bulan Ini
        $totalLahirL = $this->laporan['lahir']->where('jenis_kelamin', 'laki-laki')->sum('jumlah');
        $totalLahirP = $this->laporan['lahir']->where('jenis_kelamin', 'perempuan')->sum('jumlah');
        $totalLahirTotal = $this->laporan['lahir']->sum('jumlah');

        // Jumlah Total Meninggal Bulan Ini
        $totalMeninggalL = $this->laporan['meninggal']->where('jenis_kelamin', 'laki-laki')->sum('jumlah');
        $totalMeninggalP = $this->laporan['meninggal']->where('jenis_kelamin', 'perempuan')->sum('jumlah');
        $totalMeninggalTotal = $this->laporan['meninggal']->sum('jumlah');

        // Jumlah Total Pendatang Bulan Ini
        $totalPendatangL = $this->laporan['pendatang']->where('jenis_kelamin', 'laki-laki')->sum('jumlah');
        $totalPendatangP = $this->laporan['pendatang']->where('jenis_kelamin', 'perempuan')->sum('jumlah');
        $totalPendatangTotal = $this->laporan['pendatang']->sum('jumlah');

        // Jumlah Total Pindahan Bulan Ini
        $totalPindahanL = $this->laporan['pindahan']->where('jenis_kelamin', 'laki-laki')->sum('jumlah');
        $totalPindahanP = $this->laporan['pindahan']->where('jenis_kelamin', 'perempuan')->sum('jumlah');
        $totalPindahanTotal = $this->laporan['pindahan']->sum('jumlah');

        // Jumlah Total Penduduk Akhir Bulan
        $totalPendudukAkhirL = $this->laporan['pendudukAkhir']->where('jenis_kelamin', 'laki-laki')->sum('jumlah');
        $totalPendudukAkhirP = $this->laporan['pendudukAkhir']->where('jenis_kelamin', 'perempuan')->sum('jumlah');
        $totalPendudukAkhirTotal = $this->laporan['pendudukAkhir']->sum('jumlah');

        // Menambahkan baris total jumlah keseluruhan
        $data->push([
            'No' => '',
            'Dusun' => 'Jumlah',
            'KK L' => $totalKKL,
            'KK P' => $totalKKP,
            'KK Total' => $totalKKTotal,
            'Jumlah Rumah' => $totalJumlahRumah,
            'Penduduk Awal L' => $totalPendudukAwalL,
            'Penduduk Awal P' => $totalPendudukAwalP,
            'Penduduk Awal Total' => $totalPendudukAwalTotal,
            'Lahir L' => $totalLahirL,
            'Lahir P' => $totalLahirP,
            'Lahir Total' => $totalLahirTotal,
            'Meninggal L' => $totalMeninggalL,
            'Meninggal P' => $totalMeninggalP,
            'Meninggal Total' => $totalMeninggalTotal,
            'Pendatang L' => $totalPendatangL,
            'Pendatang P' => $totalPendatangP,
            'Pendatang Total' => $totalPendatangTotal,
            'Pindahan L' => $totalPindahanL,
            'Pindahan P' => $totalPindahanP,
            'Pindahan Total' => $totalPindahanTotal,
            'Penduduk Akhir L' => $totalPendudukAkhirL,
            'Penduduk Akhir P' => $totalPendudukAkhirP,
            'Penduduk Akhir Total' => $totalPendudukAkhirTotal,
            'Keterangan' => '',
        ]);

        return $data;
    }

    public function headings(): array
    {
        $namaBulan = [
            1 => 'JANUARI',
            2 => 'FEBRUARI',
            3 => 'MARET',
            4 => 'APRIL',
            5 => 'MEI',
            6 => 'JUNI',
            7 => 'JULI',
            8 => 'AGUSTUS',
            9 => 'SEPTEMBER',
            10 => 'OKTOBER',
            11 => 'NOVEMBER',
            12 => 'DESEMBER'
        ];

        // Baris pertama untuk judul
        $judul = [
            "LAPORAN KEPENDUDUKAN DESA PADANG KALUA BULAN {$namaBulan[$this->bulan]} $this->tahun"
        ];

        // Baris kedua kosong untuk pemisah
        $kosong = [''];

        // Header utama dan sub-header
        $headerUtama = ['No', 'Dusun', 'Jumlah KK', '', '', 'Jumlah Rumah', 'Penduduk Awal Bulan', '', '', 'Lahir Bulan Ini', '', '', 'Meninggal Bulan Ini', '', '', 'Pendatang Bulan Ini', '', '', 'Pindahan Bulan Ini', '', '', 'Penduduk Akhir Bulan', '', '', 'Ket'];
        $subHeader = ['', '', 'L', 'P', 'Total', '', 'L', 'P', 'Total', 'L', 'P', 'Total', 'L', 'P', 'Total', 'L', 'P', 'Total', 'L', 'P', 'Total', 'L', 'P', 'Total', ''];

        return [
            $judul,
            $kosong,
            $headerUtama,
            $subHeader,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Menggabungkan sel A1 hingga Y2 untuk judul
        $sheet->mergeCells('A1:Y2');

        // Mengatur gaya untuk judul
        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Mengatur header menjadi bold dan center
        $sheet->getStyle('A3:Y4')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Memusatkan isi dari baris 3 sampai akhir data di kolom A hingga Y
        $sheet->getStyle('A5:Y' . $sheet->getHighestRow())->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Mengatur lebar kolom agar sesuai konten
        foreach (range('A', 'Y') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Mengatur baris terakhir (total) menjadi bold
        $totalRow = $sheet->getHighestRow();
        $sheet->getStyle('A' . $totalRow . ':Y' . $totalRow)->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        //==================================STYLE HEADING==============================
        $sheet->mergeCells('A3:A4'); //Merge Cell untuk No
        $sheet->mergeCells('B3:B4'); //Merge Cell untuk Dusun
        $sheet->mergeCells('C3:E3'); //Merge 3 Column untuk Jumlah KK
        $sheet->mergeCells('F3:F4'); //Merge Cell untuk Jumlah Rumah
        $sheet->mergeCells('G3:I3'); //Merge 3 Column untuk Penduduk Awal Bulan
        $sheet->mergeCells('J3:L3'); //Merge 3 Column untuk Lahir Bulan Ini
        $sheet->mergeCells('M3:O3'); //Merge 3 Column untuk Meninggal Bulan Ini
        $sheet->mergeCells('P3:R3'); //Merge 3 Column untuk Pendatang Bulan Ini
        $sheet->mergeCells('S3:U3'); //Merge 3 Column untuk Pindahan Bulan Ini
        $sheet->mergeCells('V3:X3'); //Merge 3 Column untuk Penduduk Akhir Bulan
        $sheet->mergeCells('Y3:Y4'); //Merge Cell untuk Ket
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
