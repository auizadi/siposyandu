<?php

use App\Livewire\DataBalita;
use App\Livewire\DataKader;
use App\Livewire\DataLansia;
use App\Livewire\JadwalPosyandu;
use App\Livewire\Penimbangan\DataPenimbangan;
use App\Livewire\Penimbangan\FormPenimbangan;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/data-balita', DataBalita::class)->name('data-balita');
    Route::get('/export-pdf-data-balita', [DataBalita::class, 'exportPDF'])->name('export-pdf-data-balita');
    Route::get('/data-lansia', DataLansia::class)->name('data-lansia');
    Route::get('/jadwal-posyandu', JadwalPosyandu::class)->name('jadwal-posyandu');
    Route::get('/data-penimbangan', DataPenimbangan::class)->name('data-penimbangan');
    Route::get('/form-penimbangan', FormPenimbangan::class)->name('form-penimbangan');
    Route::get('/data-kader', DataKader::class)->name('data-kader');

});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
