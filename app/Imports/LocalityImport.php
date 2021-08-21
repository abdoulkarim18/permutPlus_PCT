<?php

namespace App\Imports;

use App\Models\Locality;
use Maatwebsite\Excel\Concerns\ToModel;

class LocalityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Locality([
            'name' => $row[0]
        ]);
    }
}
