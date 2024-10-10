<x-app>
<x-slot:title>
        Listagem
    </x-slot:title>

<x-slot:nav>
        <x-nav></x-nav>
    </x-slot>


<form action="{{ route('update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $produto->descricao }}">
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-control" id="categoria" name="categoria">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria }}" @if($produto->categoria == $categoria) selected @endif>{{ $categoria }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $produto->quantidade }}">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

@if(session('status'))
    <div class="alert alert-{{ session('status')['type'] }} alert-dismissible fade show" role="alert">
        {{ session('status')['message'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

</x-app>
