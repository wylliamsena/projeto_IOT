<div class="container mt-4">
       
 
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center text-white">
            <h2 class="text-dark d-flex flex-row justify-content-start mb-2" > Ambientes <i
                    class="bi bi-person-fill"></i></h2>
 
         
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.live="search" class="form-control" wire:model.live="search"
                        placeholder="Buscar Ambintes..." class="btn btn-primary">
                </div>
 
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>
 
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
 
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
 
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sensor_ID</th>
                            <th>Valor</th>
                            <th>Unidade</th>
                            <th>Data e Hora</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registros as $registro)
                            <tr>
                                <td>{{ $registro->id }}</td>
                                <td>{{ $registro->sensor_id }}</td>
                                <td>{{ $registro->valor }}</td>
                                <td>{{ $registro->unidade }}</td>
                                <td>{{ $registro->data_hora }}</td>
                               
                                <td>
                                <button wire:click="delete({{$registro->id}})"
                                    class="btn btn-sm btn-primary text-light rounded-pill" onclick="return confirm('Tem certreza')" style="background-color: #01356d">
                                    <strong> Deletear</strong>
                                    </button>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Nenhum registro encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
 
            <div class="mt-3">
            </div>
        </div>
    </div>
</div>
 
 