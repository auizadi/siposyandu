<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKader extends Model
{
    protected $fillable = [
        'user_id',
        'nik',
        'phone',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
