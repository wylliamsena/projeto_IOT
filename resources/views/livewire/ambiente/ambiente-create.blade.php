<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Cadastrar ambiente</h4>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" wire:model="nome" placeholder="" class="form-control">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" wire:model="descricao" class="form-control">
                    @error('descricao')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label class="form-label"><i class=""></i>Status</label>
                    <select class="form-select" aria-label="Status" wire:model='status'>
                        <option hidden>Ativo & Inativo</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>

                </div>

                <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </form>
        </div>
    </div>
</div>