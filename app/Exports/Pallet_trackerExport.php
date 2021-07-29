<?php

namespace App\Exports;

use App\Pallet_tracker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Pallet_trackerExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date", "Time","Quality check",
            "Weight check","Pallet Gross Weight","Used right Packaging Material?","VISA Quality Controller",
            "VISA Shift Team Leader","Remarks"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Pallet_tracker::getPallet_tracker());
        //return Production::all();
    }
    
}
