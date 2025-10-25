<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 1000px;">
        <div class="card-body">
            <h3 class="mb-4">
                <i class="bi bi-houses me-2"></i> Ambientes
            </h3>

            <!-- Botão Novo Ambiente -->
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('ambiente.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Novo Ambiente
                </a>
            </div>

            <!-- Mensagens de feedback -->
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
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Barra de pesquisa e paginação -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <input type="text" wire:model.live="search" class="form-control"
                        placeholder="🔍 Buscar ambientes...">
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

            <!-- Tabela -->
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th><i class="bi bi-house-gear me-1"></i> Nome</th>
                            <th><i class="bi bi-card-text me-1"></i> Descrição</th>
                            <th><i class="bi bi-hash me-1"></i> Status</th>
                            <th><i class="bi bi-gear me-1"></i> Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ambientes as $ambiente)
                            <tr>
                                <td>{{ $ambiente->id }}</td>
                                <td>{{ $ambiente->nome }}</td>
                                <td>{{ $ambiente->descricao }}</td>
                                <td>{{ $ambiente->status }}</td>
                                <td>
                                    <a href="{{ route('ambiente.edit', $ambiente->id) }}" class="btn btn-warning btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <button wire:click="delete({{ $ambiente->id }})" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    Nenhum ambiente encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="d-flex justify-content-center mt-3">
                {{ $ambientes->links() }}
            </div>
        </div>
    </div>
</div>
