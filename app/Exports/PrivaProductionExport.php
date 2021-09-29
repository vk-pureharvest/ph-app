<?php

namespace App\Exports;

use App\Priva_Production;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrivaProductionExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Date","Crop", "Production"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Priva_Production::getPrivaProduction());
        //return Production::all();
    }
    
}
