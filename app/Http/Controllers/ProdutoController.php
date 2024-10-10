<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{
    public function index(){
        $produtos= Produto::all();
        return view('listar',compact('produtos'));
    }


public function cadastrar(){
    $categorias = ['ALIMENTACAO','BEBIDAS','HIGIENE','LIMPEZA','OUTROS'];
    return view('cadastro',compact('categorias'));
}

public function listar(){
    return view ('listar');
}

private function taskExists($desc) {
    return Produto::where('descricao', "=", $desc)->exists();
}
    

public function store(Request $req) {
    $req->validate([
        'descricao' => 'required|string|max:255',
        'categoria' => 'required|string|in:ALIMENTACAO,BEBIDAS,HIGIENE,LIMPEZA,OUTROS',
        'quantidade' => 'required|integer|min:1', 
    ]);
        
        $produto = new Produto();
        $produto->descricao = $req->descricao;
        $produto->categoria= $req->categoria;
        $produto->quantidade = $req->quantidade;

        if ($this->taskExists($produto->descricao)) {
            return redirect()->route('cadastro')
                        ->with('status', 
                        ['type' => 'danger', 'message' => 'Produto já Cadastrado']);
        }

        $produto->save();

        return redirect()
        ->route('cadastro')
        ->with('status', 
        ['type' => 'success', 'message' => 'Adicionado com sucesso']);


}  
    

 public function excluir($id)   {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()
                ->route('listar')
                ->with(('status'), 
                ['type' => 'success', 'message' => 'Deletado com sucesso']);
 }

 public function edit($id) {
    $produto = Produto::findOrFail($id); 
    $categorias = ['ALIMENTACAO', 'BEBIDAS', 'HIGIENE', 'LIMPEZA', 'OUTROS'];
    return view('edit', compact('produto', 'categorias'));
}


public function update(Request $req, $id) {
    $req->validate([
        'descricao' => 'required|string|max:255',
        'categoria' => 'required|string|in:ALIMENTACAO,BEBIDAS,HIGIENE,LIMPEZA,OUTROS',
        'quantidade' => 'required|integer|min:1', 
    ]);
   
    $produto = Produto::findOrFail($id);
    $produto->descricao = $req->descricao;
    $produto->categoria = $req->categoria;
    $produto->quantidade = $req->quantidade;
    $produto->save();

    return redirect()
                ->route('listar')
                ->with([
                'status' => 
                ['type' => 'success', 'message' => 'Atualizado com sucesso']]);
}

} 