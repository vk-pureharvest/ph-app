<?php

namespace App\Exports;

use App\leafy_shelf_life;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Leafy_Shelf_Life_Export implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date of Testing", "Day of testing","Date Harvested","Product Type", 
       "Smell","Texture","Cracks","Wrinkles","Color","Presence of Spots","Dryness","Crunch","Remarks"
          ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(leafy_shelf_life::getLeafyShelfLifeTest());
        //return Production::all();
    }
}
