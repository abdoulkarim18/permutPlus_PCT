<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'olocalite','oschool','slocality','sschool','email','phone','user_id','customrequest_id','isAccepted'
    ];

    public function customrequest()
    {
        return $this->belongsTo(CustomRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
