<?php

namespace App\Exports;

use App\alain_utility;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlAinUtilityExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return[
            "Site","Date","Well water P1","Well water P2","Well water P3","Well water P4","RO daily water","RO reject water","Mixing unit 1 ","Mixing unit 2","Transport unit 1 ","Transport unit 2","Pad wall 1 ","Pad wall 2","Tap water 3","Tap water 4","Condensation ","Chiller","Mixing unit 50","Mixing unit 60 ","Electricity meter 1","Electricity meter 2","CO2 Leafy Greens","CO2 Tomatoes"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(alain_utility::getAlAin_Utility());
        //return Production::all();
    }
}
