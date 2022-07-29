<?php

namespace App\Exports;

use App\overtime;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class OvertimeExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date", "Employee","Reason","Requested Hours","Hours Granted","Comments"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(overtime::getOvertime());
        //return Production::all();
    }
}
