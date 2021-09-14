<?php

namespace App\Exports;

use App\Shelf_life_Berry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ShelflifeBerryExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date of Testing", "Date of Harvest","Product Type","Days Old","Good Ones","Bad Ones","Remarks"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Shelf_life_Berry::getShelfLifeBerry());
    }
}

