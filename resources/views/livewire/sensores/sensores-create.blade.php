<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 600px; border-radius: 20px;">
        <div class="card-body p-5">
            <h4 class="card-title mb-4 text-center text-primary fw-bold">
                <i class="bi bi-plus-circle me-2"></i> Cadastrar Novo Sensor
            </h4>

            <form wire:submit.prevent="store">
                <!-- Ambiente -->
                <div class="mb-3">
                    <label for="ambiente_id" class="form-label fw-semibold text-dark">
                        <i class="bi bi-building me-2 text-primary"></i> Ambiente
                    </label>
                    <select class="form-select shadow-sm" id="ambiente_id" wire:model.defer="ambiente_id" style="border-radius: 50px;">
                        <option hidden>Selecione o Ambiente</option>
                        @foreach ($ambiente as $a)
                            <option value="{{ $a->id }}">{{ $a->nome }}</option>
                        @endforeach
                    </select>
                    @error('ambiente_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Código -->
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">
                        <i class="bi bi-upc me-2 text-primary"></i> Código
                    </label>
                    <input type="text" wire:model="codigo" class="form-control shadow-sm" style="border-radius: 50px;">
                    @error('codigo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Tipo -->
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">
                        <i class="bi bi-cpu me-2 text-primary"></i> Tipo
                    </label>
                    <input type="text" wire:model="tipo" class="form-control shadow-sm" style="border-radius: 50px;">
                    @error('tipo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="form-label fw-semibold text-dark">
                        <i class="bi bi-toggle-on me-2 text-primary"></i> Status
                    </label>
                    <select class="form-select shadow-sm" id="status" wire:model.defer="status" style="border-radius: 50px;">
                        <option hidden>Selecione o Status</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm" style="border-radius: 50px;">
                        <i class="bi bi-check-circle me-2"></i> Cadastrar
                    </button>
                    <a href="{{ route('sensor.list') }}" class="btn btn-outline-secondary px-4 py-2 shadow-sm" style="border-radius: 50px;">
                        <i class="bi bi-x-circle me-2"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
