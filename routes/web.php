<?php

use App\Livewire\Dashboard;
use App\Livewire\RegistroIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);

Route::get('/registro/index', RegistroIndex::class)->name('registros.index');