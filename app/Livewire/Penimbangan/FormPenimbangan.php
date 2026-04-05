<?php

namespace App\Livewire\Penimbangan;

use App\Models\DataBalitaModel;
use App\Models\Penimbangan;
use Livewire\Component;
use Livewire\WithPagination;

class FormPenimbangan extends Component
{
    use WithPagination;

    public $search = '';
    public $balitaTerpilih = null;

    public $tanggal_penimbangan, $berat_badan, $tinggi_badan, $status_gizi;

    public $riwayat_penimbangan = [];

    public function pilihBalita($id)
    {
        $this->balitaTerpilih = DataBalitaModel::find($id);

        $this->resetPage();
    }

    public function simpan()
    {
        $this->validate([
            'tanggal_penimbangan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'status_gizi' => 'required',
        ]);

        Penimbangan::create([
            'balita_id' => $this->balitaTerpilih->id,
            'berat_badan' => $this->berat_badan,
            'tinggi_badan' => $this->tinggi_badan,
            'tanggal_penimbangan' => $this->tanggal_penimbangan,
            'status_gizi' => $this->status_gizi,
        ]);

        return redirect()->route('data-penimbangan')->with('success', 'Data berhasil disimpan');
    }

    public function getHasilPencarianProperty()
    {
        if (strlen($this->search) > 2) {
            return DataBalitaModel::where(function ($q) {
                $q->where('nik_anak', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_anak', 'like', '%' . $this->search . '%');
            })
                ->limit(10)
                ->get();
        }

        return collect();
    }

    public function render()
    {
        $riwayatPenimbangan = [];

        if ($this->balitaTerpilih) {
            $riwayatPenimbangan = Penimbangan::with('balita')
                ->where('balita_id', $this->balitaTerpilih->id)
                ->latest('tanggal_penimbangan')
                ->paginate(5);
        }
        return view('livewire.penimbangan.form-penimbangan', [
            'riwayatPenimbangan' => $riwayatPenimbangan,
        ]);
    }
}
