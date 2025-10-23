<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary fw-bold">
            <i class="bi bi-building-gear me-2"></i> Editar Ambiente
        </h3>
        <a href="{{ route('ambiente.list') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form wire:submit.prevent="update" class="p-2">
                <!-- Nome -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-type me-1"></i> Nome
                    </label>
                    <input type="text" wire:model="nome" class="form-control" placeholder="Digite o nome do ambiente">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Descrição -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-card-text me-1"></i> Descrição
                    </label>
                    <input type="text" wire:model="descricao" class="form-control" placeholder="Digite a descrição">
                    @error('descricao')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-toggle-on me-1"></i> Status
                    </label>
                    <select class="form-select 
                        @if($status == '1') border-success text-success 
                        @elseif($status == '0') border-danger text-danger 
                        @endif" 
                        wire:model="status">
                        <option hidden>Selecione...</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Botão Salvar -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check2-square me-1"></i> Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
