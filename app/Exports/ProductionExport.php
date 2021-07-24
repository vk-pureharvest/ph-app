<?php

namespace App\Exports;

use App\Production;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductionExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date", "Start Time","End Time","Workstation","Number of People","Production (boxes)","Product Type",
            "Harvest Date","Comments"
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
