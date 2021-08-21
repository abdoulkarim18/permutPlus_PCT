<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomRequest extends Model
{
    use HasFactory;

    protected $table='customrequests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'odren','oiep','oschool','sdren','siep','sschool','email','phone','user_id','isAccepted'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
}
