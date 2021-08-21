<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;


    protected $fillable =['name','iep_id','locality_id'];

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    public function iep()
    {
        return $this->belongsTo(Iep::class);
    }
}
