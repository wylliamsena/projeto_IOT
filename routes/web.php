<?php

use App\Livewire\Dashboard;
use App\Livewire\Sensores\SensoresCreate;
use App\Livewire\Sensores\SensoresEdit;
use App\Livewire\Sensores\SensoresList;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);

Route::get('/sensor/create', SensoresCreate::class)->name('sensor.create');
Route::get('/sensor/edit/{id}', SensoresEdit::class)->name('sensor.edit');
Route::get('/sensor/list', SensoresList::class)->name('sensor.list');