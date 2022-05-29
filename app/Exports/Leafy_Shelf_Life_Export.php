<?php

namespace App\Exports;

use App\leafy_shelf_life;
use Maatwebsite\Excel\Concerns\FromCollection;

class Leafy_Shelf_Life_Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return leafy_shelf_life::all();
    }
}
