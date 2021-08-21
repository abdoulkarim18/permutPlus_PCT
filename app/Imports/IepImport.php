<?php

namespace App\Imports;

use App\Models\Iep;
use Maatwebsite\Excel\Concerns\ToModel;

class IepImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Iep([
            'name' => $row[0] ,
            'dren_id' => $row[1]
        ]);
    }
}
