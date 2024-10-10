<x-app>

<x-slot:title>
        Listagem
    </x-slot>

<x-slot:nav>
        <x-nav></x-nav>
    </x-slot>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome do Produto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Quantidade</th>
    </tr>
  </thead>
  <tbody>
    @foreach($produtos as $produto)
    <tr>
      <th scope="row">{{$produto->id}}</th>
      <td>{{$produto->descricao}}</td>
      <td>{{$produto->categoria}}</td>
      <td>{{$produto->quantidade}}</td>
      <td>
       
      
    
      <form action="{{ route('excluir', $produto->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash"></i>Excluir</button>
        </form>
        <a href="{{ route('edit', $produto->id) }}" class="btn btn-warning">Editar</a>

</td>
    </tr>
    @endforeach
  </tbody>
</table>

@if(session('status'))
    <div class="alert alert-{{ session('status')['type'] }} alert-dismissible fade show" role="alert">
        {{ session('status')['message'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



</x-app>