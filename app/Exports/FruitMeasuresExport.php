<?php

namespace App\Exports;

use App\FruitMeasure;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FruitMeasuresExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date", "Row #","Product Type","BRIX","Color L","Color A","Color B","Weight","Length","Width"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(FruitMeasure::getFruitMeasure());
        //return Production::all();
    }
}
