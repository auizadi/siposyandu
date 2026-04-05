<?php

namespace App\Livewire;

use App\Models\DataBalitaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;

class DataBalita extends Component
{
    use WithPagination;

    public $nik_anak, $nama_anak, $jenis_kelamin, $tanggal_lahir, $nama_ayah, $nama_ibu, $alamat, $anak_id;
    public $isEdit = false;

    protected $listeners = ['delete-data' => 'deleteDataBalita'];

    public $search = '';
    public $perPage = 10;

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
        $this->nik_anak = '';
        $this->nama_anak = '';
        $this->jenis_kelamin = '';
        $this->tanggal_lahir = '';
        $this->nama_ayah = '';
        $this->nama_ibu = '';
        $this->alamat = '';
        $this->anak_id = null;
        $this->isEdit = false;
    }

    public function tambahDataBalita()
    {
        $this->validate([
            'nik_anak' => 'required|unique:data_balita_models,nik_anak',
            'nama_anak' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
        ]);

        DataBalitaModel::create([
            'nik_anak' => $this->nik_anak,
            'nama_anak' => $this->nama_anak,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'nama_ayah' => $this->nama_ayah,
            'nama_ibu' => $this->nama_ibu,
            'alamat' => $this->alamat,

        ]);

        $this->resetInput();

        $this->dispatch('success', message: 'Data Berhasil Ditambahkan');
    }

    public function editDataBalita($id)
    {
        $anak = DataBalitaModel::findOrFail($id);

        $this->anak_id = $id;
        $this->nik_anak = $anak->nik_anak;
        $this->nama_anak = $anak->nama_anak;
        $this->jenis_kelamin = $anak->jenis_kelamin;
        $this->tanggal_lahir = $anak->tanggal_lahir;
        $this->nama_ayah = $anak->nama_ayah;
        $this->nama_ibu = $anak->nama_ibu;
        $this->alamat = $anak->alamat;

        $this->isEdit = true;
    }

    public function updateDataBalita()
    {
        $this->validate([
            'nik_anak' => 'required|unique:data_balita_models,nik_anak,' . $this->anak_id,
            'nama_anak' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
        ]);

        DataBalitaModel::find($this->anak_id)->update([
            'nik_anak' =>  $this->nik_anak,
            'nama_anak' => $this->nama_anak,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'nama_ayah' => $this->nama_ayah,
            'nama_ibu' => $this->nama_ibu,
            'alamat' => $this->alamat,
        ]);

        $this->resetInput();

        $this->dispatch('success', message: 'Data Berhasil Diperbaharui');
    }

    public function deleteDataBalita($id)
    {
        DataBalitaModel::find($id)->delete();
        $this->dispatch('deleted');
    }


    public function exportPDF()
    {
        $balita = DataBalitaModel::orderBy('nama_anak')->get();

        $pdf = Pdf::loadView('pdf.export-data', compact('balita'))
            ->setPaper('A4', 'portrait');

        return response()->stream(
            fn() => print($pdf->output()),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="data-balita.pdf"',
            ]
        );
    }

    public function render()
    {
        $data = DataBalitaModel::query()
            ->where('nama_anak', 'like', '%' . $this->search . '%')
            ->orWhere('nik_anak', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.data-balita', compact('data'));
    }
}
