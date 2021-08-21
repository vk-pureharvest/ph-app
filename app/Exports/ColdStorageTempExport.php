<?php

namespace App\Exports;

use App\cold_storage_temp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ColdStorageTempExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
   

    public function headings():array{
        return[
            "Site","Date", "Time Recorded","Temperature Recorded","VISA Quality Controller","VISA Shift Team Leader","Remarks"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(cold_storage_temp::getColdStorageTemp());
    }

}