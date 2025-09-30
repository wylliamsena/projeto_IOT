<div class="container-fluid bg-light min-vh-100 py-4" style="background-color: #f0f4f8;"> <!-- Fundo suave da página -->
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="mb-0 text-dark">
                    <i class="bi bi-people-fill me-1"></i> Lista dos sensores
                </h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('sensor.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Novo Sensor
                </a>
            </div>
        </div>

         <div class="flex-item col-md-3 ms-2">
            <select wire:model.live="perPage" class="form-select" style="border-color: #057aef;">
                <option value="15">15 por página</option>
            </select>
        </div>

    
        <div class="card shadow-lg border-0 rounded-4 bg-white"> 
            <div class="card-body">
                <div class="row mb-4 align-items-center">
                    <div class="col-md-6 mb-2 mb-md-0">
                       
                    </div>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-info text-white"> 
                            <tr>
                                <th><i class="bi bi-person me-1"></i> Codigo</th>
                                <th><i class="bi bi-envelope me-1"></i> Tipo</th>
                                <th><i class="bi bi-credit-card me-1"></i> Descrição</th>
                                <th><i class="bi bi-envelope me-1"></i> Status</th>
                                <th class="text-center"><i class="bi bi-gear me-1"></i> Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sensores as $sensor)
                                <tr class="hover-table">
                                    <td>{{ $sensor->codigo }}</td>
                                    <td>{{ $sensor->tipo }}</td>
                                    <td>{{ $sensor->descricao }}</td>
                                    <td>{{ $sensor->status }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('sensor.edit', $sensor->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button wire:click="delete({{$sensor->id}})"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Tem Certeza')">
                                    <i class="bi bi-person-x-fill"></i>
                                </button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                   <td colspan="5" class="text-center text-muted">
                                       <i class="bi bi-info-circle"></i> Nenhum sensor encontrado.
                                   </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex flex-column align-items-center mt-3">
        <div class="mb-2">
            Mostrando {{ $sensores->firstItem() }} até {{ $sensores->lastItem() }} de
            {{ $sensores->total() }} resultados
        </div>
       
        <nav aria-label="Page navigation example">
            <ul class="pagination">
             
                <li class="page-item {{ $sensores->onFirstPage() ? 'disabled' : '' }}">
                    <a href="#" class="page-link" wire:click.prevent="previousPage" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                
                @foreach ($sensores->getUrlRange(1, $sensores->lastPage()) as $page => $url)
                    <li class="page-item {{ $sensores->currentPage() == $page ? 'active' : '' }}">
                        <a href="#" class="page-link" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                    </li>
                @endforeach

              
                <li class="page-item {{ $sensores->hasMorePages() ? '' : 'disabled' }}">
                    <a href="#" class="page-link" wire:click.prevent="nextPage" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>


    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                </div>
            </div>
        </div>
    </div>
</div>
