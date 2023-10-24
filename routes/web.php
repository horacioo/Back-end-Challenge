<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });



Route::prefix('pastelaria')->group(function () {
    
    Route::get('administracao', function () {  return view('pastelaria.administracao.cadastro');  });
    Route::get('vitrine', function () {  return view('pastelaria.produtos.lista'); })->name("vitrineDaPastelaria");//aqui eu exibo os produtos da pastelaria

    Route::prefix('clientes')->group(function () {
        Route::get('cadastro', function () { return view('pastelaria.clientes.cadastro'); })->name('cadastraCliente');
        Route::get('minha_conta', function () { return view('pastelaria.clientes.index'); })->name('MinhaConta');
    });
});