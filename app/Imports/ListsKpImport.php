<?php

namespace App\Imports;

use App\Models\ListKp;
use Maatwebsite\Excel\Concerns\ToModel;

class ListsKpImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ListKp([
            'name'        => $row['name'],
            'address'     => $row['address'],
            'telephone'   => $row['telephone'],
            'postal_code' => $row['postal_code'],
            'city'        => $row['city'],
        ]);
    }
}
