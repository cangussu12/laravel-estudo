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
/*
Route::get('/', function () {
    return 'Olá, seja bem vindo !';
});
*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobrenos',[\App\Http\Controllers\SobrenosController::class, 'sobrenos'])->name('site.sobrenos');
Route::match(['get', 'post'], '/contato',[\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::match(['get', 'post'], '/contatosalvar',[\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login', function() { return 'Login';})->name('site.login');


Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() { return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function() { return 'Produtos';})->name('app.produtos');
});
Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\testeController::class, 'teste'])->name('teste');


Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para a pagina inicial.';
});