<x-app>

<x-slot:title>
        Cadastro
    </x-slot>


<x-slot:nav>
        <x-nav></x-nav>
    </x-slot>


<form action="{{route('pro-store')}}" method="POST">
  @csrf
  
    <div class="mb-3">
      <label for="descricao" class="form-label">Nome do Produto:</label>
      <input type="text" id="desc" name="descricao"class="form-control" placeholder="Digite o nome do Produto:">
    </div>
    <div class="mb-3">
      <label for="categoria" class="form-label">Categoria:</label>
      <select id="cat" name="categoria" class="form-select">

        @foreach($categorias as $categoria)
        <option value ="{{$categoria}}"> {{$categoria}}
        </option>
        @endforeach

      </select>
    </div>
    <div class="mb-3">
      <label for="quantidade" class="form-label">quantidade:</label>
      <input type="number" id="quant" name="quantidade" class="form-control" placeholder="Digite a Quantidade:">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  
</form>

@if(session('status'))
    <div class="alert alert-{{ session('status')['type'] }} alert-dismissible fade show" role="alert">
       {{ session('status')['message'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    
</x-app>