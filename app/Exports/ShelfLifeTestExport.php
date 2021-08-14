<?php

namespace App\Exports;

use App\ShelfLifeTest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ShelfLifeTestExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date of Testing", "Date of Harvest","Product Type","BRIX","Color L","Color A","Color B","Weight","Length","Width","Pressure","Remarks"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(ShelfLifeTest::getShelfLifeTest());
        //return Production::all();
    }
}

