<?php

namespace App\Exports;

use App\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComplaintsExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date", "Customer","Complaint Category 1","Complaint Category 2","Additional Details","Product Type","Financial Impact (AED)"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Complaint::getComplaint());
        //return Production::all();
    }
}
