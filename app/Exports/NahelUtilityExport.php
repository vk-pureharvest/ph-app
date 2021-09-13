<?php

namespace App\Exports;

use App\Nahel_Utility;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NahelUtilityExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return[
            "Site","Date", "Electra 1","Electra 2","Reject Water","Supply Water Corridor 1","Supply Water Corridor 2","Irrigation Water","Ground Water"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Nahel_Utility::getNahel_Utility());
        //return Production::all();
    }
}

