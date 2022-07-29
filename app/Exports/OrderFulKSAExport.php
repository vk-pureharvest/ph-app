<?php

namespace App\Exports;

use App\order_ful_ksa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderFulKSAExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date","Product Type","Ordered KGs","Delivered KGs","Forcasted KGs","Harvested KGs","Comments"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(order_ful_ksa::getOrderFulKSA());
        //return Production::all();
    }
}
