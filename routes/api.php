<?php

use App\Http\Controllers\pastelaria\ClientesController;
use App\Http\Controllers\pastelaria\PedidosController;
use App\Http\Controllers\pastelaria\ProdutosController;
use App\Models\pastelaria\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




/*
Route::prefix('pastelaria/adm')->group(function () {

    Route::post('/criar', [ProdutosController::class, 'store'])->name("CadastraProduto");
    Route::delete('/apagar/{id}', [ProdutosController::class, 'destroy'])->name("DeletarProduto");
    Route::post('/update', [ProdutosController::class, 'update'])->name("AtualizarProduto");
    Route::get('/produtos',[ProdutosController::class, 'index'] )->name("ListaDeProduto");
    Route::post('/clientes/cadastrar',[ClientesController::class , 'store'] )->name("cadastrarCliente");
    Route::post('/pedidos/cadastrar',[PedidosController::class , 'store'] )->name("cadastrarPedido");
    Route::get('/clientes/conta/{id}',[ClientesController::class , 'show'] )->name("minhaConta");
    Route::post('/clientes/conta/update',[ClientesController::class , 'update'] )->name("minhaContaUpdate");

});

Route::delete('pastelaria/adm/clientes/conta/delete/{id}',[ClientesController::class , 'destroy' ] );
Route::get('pastelaria/carrinho',[PedidosController::class , 'carrinho' ] )->name("carrinhoDeCompras");
Route::delete('/pastelaria/carrinho/excluir/{id}',[PedidosController::class , 'deletar'] )->name("minhaContaUpdate");
*/

Route::prefix('pastelaria/adm')->group(function () {

    // Rotas de Produtos
    Route::post('/criar', [ProdutosController::class, 'store'])->name("CadastraProduto");
    Route::delete('/apagar/{id}', [ProdutosController::class, 'destroy'])->name("DeletarProduto");
    Route::post('/update', [ProdutosController::class, 'update'])->name("AtualizarProduto");
    Route::get('/produtos', [ProdutosController::class, 'index'])->name("ListaDeProduto");

    // Rotas de Clientes
    Route::post('/clientes/cadastrar', [ClientesController::class, 'store'])->name("cadastrarCliente");
    Route::get('/clientes/conta/{id}', [ClientesController::class, 'show'])->name("minhaConta");
    Route::post('/clientes/conta/update', [ClientesController::class, 'update'])->name("minhaContaUpdate");
    Route::delete('/clientes/conta/delete/{id}', [ClientesController::class, 'destroy']);

    // Rota de Pedidos
    Route::post('/pedidos/cadastrar', [PedidosController::class, 'store'])->name("cadastrarPedido");

});

// Outras Rotas
Route::get('/pastelaria/carrinho', [PedidosController::class, 'carrinho'])->name("carrinhoDeCompras");
Route::delete('/pastelaria/carrinho/excluir/{id}', [PedidosController::class, 'deletar'])->name("deletarDoCarrinho");


