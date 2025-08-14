<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;
use Livewire\WithPagination;

class AmbienteList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];
    public function render()
    {
        $clientes = Ambiente::where('nome', 'like', "%{$this->search}%")
        ->orWhere('descricao', 'like', "%{$this->search}%")
        ->orWhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);
        return view('livewire.ambiente.ambiente-list');
    }
}
