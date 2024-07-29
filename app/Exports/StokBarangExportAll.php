<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StokBarangExportAll implements WithMultipleSheets
{
    protected $divisis;

    public function __construct($divisis)
    {
        $this->divisis = $divisis;
    }
    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->divisis as $divisi) {
            $sheets[] = new StokBarangExport($divisi);
        }

        return $sheets;
    }
}
