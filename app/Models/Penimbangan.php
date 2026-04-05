<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
    protected $fillable = ['balita_id', 'tanggal_penimbangan', 'berat_badan', 'tinggi_badan', 'status_gizi'];
    protected $casts = ['tanggal_penimbangan' => 'date'];
    public function balita()
    {
        return $this->belongsTo(DataBalitaModel::class, 'balita_id');
    }
}
