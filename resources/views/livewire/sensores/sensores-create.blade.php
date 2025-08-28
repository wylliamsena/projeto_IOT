<div class="d-flex justify-content-center align-items-center mt-5" style="background-color: #f7f7f7;"> <!-- Cor de fundo alterada -->
    <div class="card shadow-lg bg-dark text-light border-0" style="width: 100%; max-width: 600px;"> <!-- Cor do card alterada -->
        <div class="card-body">
            <h4 class="card-title mb-4 text-center text-success"> <!-- Cor do título alterada -->
                <i class="bi bi-"></i> Cadastrar novo sensor
            </h4>

            <form wire:submit.prevent="store">

               <div class="mb-3">
                    <label for="ambiente_id" class="form-label" style="color: #fff">Ambiente</label>
                    <select class="form-select" id="ambiente_id" wire:model.defer="ambiente_id" style="border-radius: 100px">
                        <option hidden>Selecione o Ambiente</option>
                        @foreach ($ambientes as $ambiente)
                            <option value={{ $ambiente->id }}> {{ $ambiente->nome }} </option>
                        @endforeach
                    </select>
                </div>
                   
                <div class="mb-3">
                    <label class="form-label text-light"><i class="bi bi-person" ></i> codigo</label>
                    <input type="text" wire:model="codigo" class="form-control" >
                    @error('codigo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label text-light"><i class="bi bi-credit-card"></i> Tipo</label>
                    <input type="text" wire:model="tipo" class="form-control">
                    @error('tipo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
            <span style="font-size:20px">
                <label for="status" class="form-label">Status</label>
                <i class="bi bi-briefcase-fill"></i>
            </span>

            <select class="form-select" aria-label="default-select example"@error('status') is-invalid @enderror
                id="status" wire:model.defer="status" placeholder="">
                  <option hidden>Selecione o Status</option>
                <option hidden></option>
                <option value="1">True</option>
                <option value="0">False</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

                <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('sensor.list') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>