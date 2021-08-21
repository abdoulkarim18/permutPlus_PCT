<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','longitude','latitude',
    ];

    public function etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }
}
