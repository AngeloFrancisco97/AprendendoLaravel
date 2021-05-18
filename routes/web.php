<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AutenticacaoMiddleware;

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

// Route::get('/', function () {
//     return 'Olá, seja bem vindo ao curso';
// });

// Route::get('/sobre-nos', function () {
//     return 'Sobre nós';
// });

// Route::get('/contato', function () {
//     return 'Contato';
// });

// nome. categoria, assunto, mensagem
// Route::get('/contato/{nome}/{mensagem_id}', function(string $nome, int $mensagem_id = 1) {
    //     echo "estamos aqui: $nome - $mensagem_id";
    // })->where('mensagem_id', '[0-9]+')->where('nome', '[A-Za-z]+');
    
// Route::get('/rota1', function(){
//     echo 'Rota 1';

// })->name('site.rota1');

// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// Route::redirect('/rota2', '/rota1');


Route::get('/','PrincipalController@principal')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::post('/contato','ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/clientes',function (){ return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos',function (){ return 'Produtos';})->name('app.produtos');
});


Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');