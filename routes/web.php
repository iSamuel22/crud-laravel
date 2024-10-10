<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('pindex');
})->name('pindex');

Route::get('/cadastro',[ProdutoController::class,'cadastrar'])->name('cadastro');
Route::get('/listar',[ProdutoController::class,'listar'])->name('listar');
Route::post('/cadastro',[ProdutoController::class,'store'])->name('pro-store');
Route::get('/listar',[ProdutoController::class,'index'])->name('listar');
Route::delete('/produto/{id}',[ProdutoController::class,'excluir'])->name('excluir');
Route::get('/produto/{id}/editar', [ProdutoController::class, 'edit'])->name('edit');
Route::put('/produto/{id}', [ProdutoController::class, 'update'])->name('update');