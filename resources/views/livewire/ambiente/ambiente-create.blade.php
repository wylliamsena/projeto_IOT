<div class="container mt-5">
    <div class="card shadow border-0 mx-auto" style="max-width: 550px; border-radius: 20px;">
        <div class="card-body p-4">

            <h4 class="text-center mb-4 fw-bold" style="color: #0066FF;">
                <i class="bi bi-plus-circle me-2"></i> Cadastrar Novo Ambiente
            </h4>

            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="store">
                <!-- Nome -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-building me-2" style="color:#0066FF;"></i>Nome
                    </label>
                    <input type="text" wire:model="nome" placeholder="Digite o nome do ambiente"
                        class="form-control border rounded-pill py-2 px-3">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Descrição -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-card-text me-2" style="color:#0066FF;"></i>Descrição
                    </label>
                    <input type="text" wire:model="descricao" placeholder="Digite uma descrição"
                        class="form-control border rounded-pill py-2 px-3">
                    @error('descricao')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-toggle-on me-2" style="color:#0066FF;"></i>Status
                    </label>
                    <select class="form-select border rounded-pill py-2 px-3" wire:model="status">
                        <option hidden>Selecione o Status</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-between">
                    <button type="submit"
                        class="btn text-white fw-semibold w-50 me-2"
                        style="background-color:#0066FF; border-radius: 30px;">
                        <i class="bi bi-check-circle me-1"></i> Cadastrar
                    </button>

                    <button type="button" onclick="window.history.back()"
                        class="btn border fw-semibold w-50"
                        style="border-radius: 30px; color:#0066FF; border-color:#0066FF;">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>