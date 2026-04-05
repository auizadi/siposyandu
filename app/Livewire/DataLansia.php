<?php

namespace App\Livewire;

use App\Models\DataLansia as ModelsDataLansia;
use Livewire\Component;
use Livewire\WithPagination;

class DataLansia extends Component
{
    use WithPagination;

    public $lansia_id;
    public $nik_lansia, $nama_lansia, $jenis_kelamin, $tanggal_lahir, $riwayat_kesehatan, $alamat;

    public $isEdit = false;

    protected $listeners = ['delete-data' => 'deleteDataLansia'];

    public $perPage = 10;
    public $search = '';

    protected $updatesQueryString = ['search', 'perPage'];

    public function upadatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetInput()
    {
        $this->nik_lansia = '';
        $this->nama_lansia = '';
        $this->jenis_kelamin = '';
        $this->tanggal_lahir = '';
        $this->riwayat_kesehatan = '';
        $this->alamat = '';
        $this->riwayat_kesehatan = '';
        $this->lansia_id = null;
        $this->isEdit = false;
    }

    public function tambahDataLansia()
    {
        $this->validate([
            'nik_lansia' => 'required|unique:data_lansias,nik_lansia',
            'nama_lansia' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'riwayat_kesehatan' => 'required',
        ]);

        ModelsDataLansia::create([
            'nik_lansia' => $this->nik_lansia,
            'nama_lansia' => $this->nama_lansia,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'riwayat_kesehatan' => $this->riwayat_kesehatan,
        ]);

        $this->resetInput();
        $this->dispatch('success', message: 'Data Berhasil Ditambahkan');
    }

    public function editDataLansia($id)
    {
        $lansia = ModelsDataLansia::findOrFail($id);

        $this->lansia_id = $id;
        $this->nik_lansia = $lansia->nik_lansia;
        $this->nama_lansia = $lansia->nama_lansia;
        $this->tanggal_lahir = $lansia->tanggal_lahir;
        $this->jenis_kelamin = $lansia->jenis_kelamin;
        $this->alamat = $lansia->alamat;
        $this->riwayat_kesehatan = $lansia->riwayat_kesehatan;

        $this->isEdit = true;
    }

    public function updateDataLansia()
    {
        $this->validate([
            'nik_lansia' => 'required|unique:data_lansias,nik_lansia,' . $this->lansia_id,
            'nama_lansia' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'riwayat_kesehatan' => 'required',
        ]);

        ModelsDataLansia::find($this->lansia_id)->update([
            'nik_lansia' => $this->nik_lansia,
            'nama_lansia' => $this->nama_lansia,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'riwayat_kesehatan' => $this->riwayat_kesehatan,
        ]);

        $this->resetInput();

        $this->dispatch('success', message: 'Data Berhasil Diperbaharui');
    }

    public function deleteDataLansia($id)
    {
        ModelsDataLansia::find($id)->delete();
        $this->dispatch('deleted');
    }

    public function render()
    {
        $data = ModelsDataLansia::query()
            ->where('nik_lansia', 'like', '%' . $this->search . '%')
            ->orWhere('nama_lansia', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.data-lansia', compact('data'));
    }
}
