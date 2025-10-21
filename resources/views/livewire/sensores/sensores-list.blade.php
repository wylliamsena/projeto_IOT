<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-thermometer-half me-2"></i> Sensores</h2>
        <a href="{{ route('sensor.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Novo Sensor
        </a>
    </div>

    <!-- Mensagem de sucesso -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <span>{{ session('message') }}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabela de sensores -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th><i class="bi bi-hash me-1"></i> ID</th>
                    <th><i class="bi bi-building me-1"></i> Ambiente</th>
                    <th><i class="bi bi-gear me-1"></i> Tipo</th>
                    <th><i class="bi bi-card-text me-1"></i> Descrição</th>
                    <th><i class="bi bi-code-slash me-1"></i> Código</th>
                    <th><i class="bi bi-toggle-on me-1"></i> Status</th>
                    <th><i class="bi bi-gear-fill me-1"></i> Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sensores as $sensor)
                    <tr>
                        <td>{{ $sensor->id }}</td>
                        <td>{{ $sensor->ambiente->nome }}</td>
                        <td>{{ $sensor->tipo }}</td>
                        <td>{{ $sensor->descricao }}</td>
                        <td>{{ $sensor->codigo }}</td>
                        <td>
                            <div class="form-check form-switch d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="sensorSwitch{{ $sensor->id }}" wire:click="toggleStatus({{ $sensor->id }})"
                                    {{ $sensor->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label ms-2" for="sensorSwitch{{ $sensor->id }}">
                                    @if($sensor->status == 1)
                                        <i class="bi bi-check-circle-fill text-success me-1"></i> Ativo
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger me-1"></i> Inativo
                                    @endif
                                </label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('sensor.edit', $sensor->id) }}" class="btn btn-sm btn-warning me-1" title="Editar">
                                <i class="bi bi-pencil-square me-1"></i> Editar
                            </a>
                            <button wire:click="delete({{ $sensor->id }})" class="btn btn-sm btn-outline-danger"
                                title="Excluir" wire:confirm="Tem certeza?">
                                <i class="bi bi-trash-fill me-1"></i> Excluir
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="bi bi-exclamation-circle me-1"></i> Nenhum sensor encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
    <div class="mb-2 text-center">
        Mostrando {{ $sensores->firstItem() }} até {{ $sensores->lastItem() }} de
        {{ $sensores->total() }} resultados
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
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
</div>
