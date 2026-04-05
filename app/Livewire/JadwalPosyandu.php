<?php

namespace App\Livewire;

use App\Models\JadwalPosyandu as ModelsJadwalPosyandu;
use Carbon\Carbon as CarbonAlias;
use Illuminate\Support\Carbon as SupportCarbon;
use Livewire\Component;
use Illuminate\Support\Carbon\Carbon;

class JadwalPosyandu extends Component
{

    public $jadwal_posyandu_lansia, $jadwal_posyandu_balita;

    public $matrix = [];
    public $posyandus = [];

    public function mount()
    {
        $jadwals = ModelsJadwalPosyandu::all();

        foreach ($jadwals as $j) {
            $bulan = CarbonAlias::parse($j->tanggal)->month;
            $nama = $j->jenis;

            $this->posyandus[$nama] = $nama;

            $this->matrix[$nama][$bulan][] = [
                'tanggal' => CarbonAlias::parse($j->tanggal)->format('d'),
                'jenis' => $j->jenis,
            ];
        }
    }

    protected function rules()
    {
        return [
            'jadwal_posyandu_balita' => 'required|date',
            'jadwal_posyandu_lansia' => 'required|date',
        ];
    }

    // simpan balita
    public function buatJadwalBalita()
    {
        $this->validateOnly('jadwal_posyandu_balita');

        ModelsJadwalPosyandu::updateOrCreate([
            'jenis' => 'balita',
            'tanggal' => $this->jadwal_posyandu_balita
        ], [
            'tanggal' => $this->jadwal_posyandu_balita
        ]);

        $this->reset('jadwal_posyandu_balita');
        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text' => 'Jadwal balita berhasil ditambahkan',
            'icon' => 'success',
        ]);
    }

    // simpan lansia
    public function buatJadwalLansia()
    {
        $this->validateOnly('jadwal_posyandu_lansia');

        ModelsJadwalPosyandu::updateOrCreate([
            'jenis' => 'lansia',
            'tanggal' => $this->jadwal_posyandu_lansia
        ], [
            'tanggal' => $this->jadwal_posyandu_lansia
        ]);

        $this->reset('jadwal_posyandu_lansia');
        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text' => 'Jadwal lansia berhasil ditambahkan',
            'icon' => 'success',
        ]);
    }

    public function render()
    {

        return view('livewire.jadwal-posyandu');
    }
}
