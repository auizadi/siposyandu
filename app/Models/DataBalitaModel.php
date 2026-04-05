<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Carbon\Carbon;

class DataBalitaModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik_anak',
        'nama_anak',
        'jenis_kelamin',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'alamat',
    ];

    protected $casts = ['tanggal_lahir' => 'date'];

    public function getUsiaAttribute()
    {
        $lahir = Carbon::parse($this->tanggal_lahir);
        $diff = $lahir->diff(Carbon::now());

        if ($diff->y < 2) {
            return $lahir->diffInMonths(now()) . ' bulan';
        }

        return "{$diff->y} th {$diff->m} bln";
    }

    public function penimbangan()
    {
        return $this->hasMany(Penimbangan::class, 'balita_id');
    }
}
