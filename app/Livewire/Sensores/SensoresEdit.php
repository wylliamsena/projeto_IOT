<?php

namespace App\Livewire\Sensores;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensoresEdit extends Component
{

    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;
    public $nome;
 
    public function mount($id)
    {
 
        $sensor = Sensor::find($id);
        if ($sensor == null) {
            session()->flash('error', 'Sensor não encontrado');
            return redirect()->route('Sensor.index');
        }
        $this->ambiente_id = $sensor->id;
            $this->nome = $sensor->nome;
            $this->descricao = $sensor->descricao;
            $this->status = $sensor->status;
       
    }
 
 
    public function update()
    {
       
 
        $sensor = Sensor::find($this->ambienteId);
 
        $sensor->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status,
            'ambiente_id' => $this->ambiente_id,
        ]);
 
 
        session()->flash('message', 'Sensor atualizado com sucesso.');
        return redirect()->route('Sensor.create');
    }
    public function render()
    {
        $ambientes=Ambiente::all();
        return view('livewire.sensores.sensores-edit', compact('ambientes'));
    }
}
