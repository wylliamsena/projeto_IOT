<?php


use App\Livewire\Dashboard;
use App\Livewire\Sensores\SensoresCreate;
use App\Livewire\Sensores\SensoresEdit;
use App\Livewire\Sensores\SensoresList;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('/sensor/create', SensoresCreate::class)->name('sensor.create');
Route::get('/sensor/edit/{id}', SensoresEdit::class)->name('sensor.edit');
Route::get('/sensor/list', SensoresList::class)->name('sensor.list');


use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use App\Livewire\Auth\Login;

Route::get('/ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('/ambiente/edit/{id}', AmbienteEdit::class)->name('ambiente.edit');
Route::get('/ambiente/list', AmbienteList::class)->name('ambiente.list');


use App\Livewire\RegistroIndex;
Route::get('/registro/index', RegistroIndex::class)->name('registros.index');

Route::get('/', Login::class)->name('login');

