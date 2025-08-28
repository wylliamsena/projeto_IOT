<?php

namespace App\Livewire\Sensores;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensoresCreate extends Component
{
public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

     public function store()
    {

        Sensor::Create([
            'ambiente_id' => $this -> ambiente_id,
            'codigo' => $this -> codigo,
            'tipo' => $this -> tipo,
            'descricao' => $this -> descricao,
            'status' => $this -> status,
        ]);

        session()->flash('message', 'Sensor Cadastrado');$this->reset(['ambiente_id', 'codigo', 'tipo', 'descricao', 'status']);
        return redirect()->route('sensor.list');

    }

    public function render()
    {
        $ambiente = Ambiente::all();
        return view('livewire.sensores.sensores-create', compact('ambiente'));
    }
}
