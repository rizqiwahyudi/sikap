<?php

namespace App\Exports;

use App\Models\ListKp;
use Maatwebsite\Excel\Concerns\FromCollection;

class ListsKpExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ListKp::all();
    }
}
