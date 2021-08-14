<?php

namespace App\Exports;

use App\packingqc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PackingQCExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            "Site","Date", "Product Type","Total Kg","Reason for Damage", "Percentage"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(packingqc::getPackingQC());
    }
}
