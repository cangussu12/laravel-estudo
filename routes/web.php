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
Route::get('/contato',[\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function() { return 'Login';})->name('site.login');


Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() { return 'Clientes';});
    Route::get('/fornecedores', function() { return 'Fornecedores';});
    Route::get('/produtos', function() { return 'Produtos';});
});

Route::get('/rota1', function() {
    echo 'rota 1';
})->name('site.rota1');
    
Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');


//Route::redirect('/rota2', '/rota1');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para a pagina inicial.';
});