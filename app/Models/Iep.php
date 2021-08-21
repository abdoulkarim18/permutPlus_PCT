<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iep extends Model
{
    use HasFactory;

    protected $fillable=['name', 'dren_id'];

    public function dren()
    {
      return $this->belongsTo(Dren::class);
    }

    public function etablissements()
    {
      return $this->hasMany(Etablissement::class);
    }
}
