<?php

namespace App\Exports;

use App\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "Site","Date Recorded","Variety","Zone","Unit","Value","Comments"
        ];
    }
    public function collection()
    {
        return collect(Inventory::getInventory());
    }
}


