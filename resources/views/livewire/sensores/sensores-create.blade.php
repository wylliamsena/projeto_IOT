<div class="d-flex justify-content-center align-items-center mt-5"> <!-- Cor de fundo alterada -->
    <div class="card shadow-lg bg-muted text-light border-0" style="width: 100%; max-width: 600px;"> 
        <div class="card-body">
            <h4 class="card-title mb-4 text-center text-primary"> 
                <i class="bi bi-"></i> Cadastrar novo sensor
            </h4>

            <form wire:submit.prevent="store">

               <div class="mb-3">
                    <label for="ambiente_id" class="form-label" style="color: #010000">Ambiente</label>
                    <select class="form-select" id="ambiente_id" wire:model.defer="ambiente_id" style="border-radius: 100px">
                        <option hidden>Selecione o Ambiente</option>
                        @foreach ($ambiente as $a)
                            <option value={{ $a->id }}> {{ $a->nome }} </option>
                        @endforeach
                    </select>
                </div>
                   
                <div class="mb-3"style="border-radius: 100px">
                    <label class="form-label text-dark" ><i class="bi bi-person" style="color: #010000"></i> codigo</label>
                    <input type="text" wire:model="codigo" class="form-control" style="border-radius: 100px" >
                    @error('codigo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark" ><i class="bi bi-credit-card" style="color: #010000"></i> Tipo</label>
                    <input type="text" wire:model="tipo" class="form-control" style="border-radius: 100px">
                    @error('tipo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3" >
            <span style="font-size:18px" >
                <label for="status" class="form-label" style="color: #010000" >Status</label>
                <i class="bi bi-briefcase-fill" style="color: #010000"></i>
            </span>

            <select class="form-select" aria-label="default-select example"@error('status') is-invalid @enderror
                id="status" wire:model.defer="status" placeholder="" style="border-radius: 100px">
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