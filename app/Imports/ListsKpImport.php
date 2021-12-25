<?php

namespace App\Imports;

use App\Models\ListKp;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

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
            'name'        => $row[0],
            'address'     => $row[1],
            'telephone'   => $row[2],
            'postal_code' => $row[3],
            'city'        => $row[4],
            'created_by'  => Auth::user()->username
        ]);
    }
}
