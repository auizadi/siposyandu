<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataKader extends Component
{
    use WithPagination;
    public $search = '';
    public $email, $password, $name;
    protected $listeners = ['delete-data' => 'deleteDataKader'];
    public $perPage = 10;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];
    public function tambahKader()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'status' => true,
        ]);

        $user->assignRole('kader');

        // reset form
        $this->reset([
            'name',
            'email',
            'password',
        ]);

        // tutup modal
        $this->dispatch('close-modal', 'create-kader');

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text' => 'Kader berhasil ditambahkan',
            'icon' => 'success',
        ]);
    }

    public function deleteDataKader($id)
    {
        User::find($id)->delete();
        $this->dispatch('deleted');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $kaders = User::query()
            ->role('kader')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . "%")
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()->paginate($this->perPage);

        return view('livewire.data-kader', ['kaders' => $kaders]);
    }
}
