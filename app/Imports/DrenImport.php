<?php

namespace App\Imports;

use App\Models\Dren;
use Maatwebsite\Excel\Concerns\ToModel;

class DrenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dren([
            'name' => $row[0]
        ]);
    }
}
