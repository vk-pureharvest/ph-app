<?php

namespace App\Exports;

use App\Class2_production;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Class2_productionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */ 


    public function headings():array{
        return[
            "Site","Date", "Product Type","Class Type","Production (Kg)"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Class2_production::getClass2Production());
    }

}

   