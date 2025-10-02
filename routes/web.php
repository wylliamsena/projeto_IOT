<?php


use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use Illuminate\Support\Facades\Route;

Route::get('/ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('/ambiente/edit/{id}', AmbienteEdit::class)->name('ambiente.edit');
Route::get('/ambiente/list', AmbienteList::class)->name('ambiente.list');

use App\Livewire\Dashboard;
use App\Livewire\RegistroIndex;


Route::get('/', Dashboard::class);

Route::get('/registro/index', RegistroIndex::class)->name('registros.index');

