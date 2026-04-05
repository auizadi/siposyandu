<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLansia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik_lansia',
        'nama_lansia',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'riwayat_kesehatan',
    ];

    protected $casts = ['tanggal_lahir' => 'date'];

    public function getUmurAttribute(){
        $diff = $this->tanggal_lahir->diff(now());

        $parts = [];

        if ($diff->y) $parts[] = "{$diff->y} Tahun";
        if ($diff->m) $parts[] = "{$diff->m} Bulan";
        if ($diff->d) $parts[] = "{$diff->d} Hari";

        return implode(' ', $parts);
    }

}
