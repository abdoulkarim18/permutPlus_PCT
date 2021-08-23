<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dren extends Model
{
    protected $fillable=['name'];
    use HasFactory;

    public function ieps()
    {
        return $this->hasMany(Iep::class);
    }


    
}
