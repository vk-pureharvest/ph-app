<?php

namespace App\Exports;

use App\Production;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductionExport implements FromCollection
{
    public function headings():array{
        return[
            "site_name",
            "comment",
            "created_at"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Production::getProduction());
        //return Production::all();
    }
    
}
