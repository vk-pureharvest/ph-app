<?php

namespace App\Exports;

use App\Incident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncidentsExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Reported By","Date Received","Title","Type of Incident","Site","Employee Name","Employee Title","Location","Specific Location",
         "Additional People Involved","Witnesses","Incident Description","Root Cause","Resulting Action Executed","Action Plan to Avoid Future Instances"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Incident::getIncident());
        //return Production::all();
    }
    

}
