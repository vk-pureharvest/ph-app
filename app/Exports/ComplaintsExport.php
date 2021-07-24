<?php

namespace App\Exports;

use App\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComplaintsExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date", "Customer","Complaint Category","Additional Details","Product Type","Financial Impact (AED)"
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
