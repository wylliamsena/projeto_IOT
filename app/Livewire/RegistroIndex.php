<?php

namespace App\Livewire;

use App\Models\Registro;
use App\Models\User;
use Livewire\Component;

class RegistroIndex extends Component
{
    public $search = '';
    public $perPage = 10;

    protected $queryString =[
        'search' => ['except' =>''],
        'perPage' => ['except' =>10]
    ];

    public function render()
    {
         $registros = Registro::where('sensor_id', 'like', "%{$this->search}%")
        ->orwhere('unidade', 'like', "%{$this->search}%")
         ->orwhere('data_hora', 'like', "%{$this->search}%")
          ->orwhere('id', 'sensor_id', 'valor', 'unidade', 'data_hora')
          ->orderByDesc('data_hora', 'like', 'valor', 'unidade', 'data_hora')
          ->paginate($this->perPage);

        return view('livewire.registro-index', compact('registros'));
    }

    public function delete($id)
    {
        $registro = Registro::find($id);
        $registro->delete();

        session()->flash('message', 'Registro deletado com sucesso');
    }
}
