<?php

namespace App\Livewire\Penimbangan;

use App\Models\Penimbangan;
use Livewire\Component;
use Livewire\WithPagination;

class DataPenimbangan extends Component
{
    use WithPagination;
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
    public function render()
    {
        $data = Penimbangan::with('balita')->latest()->paginate($this->perPage);
        return view('livewire.penimbangan.data-penimbangan', compact('data'));
    }
}
