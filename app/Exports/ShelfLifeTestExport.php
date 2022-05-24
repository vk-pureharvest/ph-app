<?php

namespace App\Exports;

use App\ShelfLifeTest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ShelfLifeTestExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date of Testing", "Day of testing","Date Harvested","Product Type","Color","Color Rank","BRIX",
            "Firmness","Firmness Rank","Smell Rank","Weight","Weight Rank","Vine Quality","Presence of Spots",
            "Presence of Fungus","Quality Rank","Remarks"
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

