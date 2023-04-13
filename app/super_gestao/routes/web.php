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
    //return view('welcome');
    return('Olá, seja bem vindo!');
});
*/
//Laravel anterior ao 8
//Route::get('/', 'PrincipalController@principal');

//Laravel 8 em diante
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

//Rota sobre-nos
Route::get('/sobre-nos', [ \App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

//Rota Contato
Route::get('/contato', [ \App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');


Route::get('/login', function () {    
    return('Login');
});

//Rotas agrupadas
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function () { return('Clientes'); })->name('app.clientes');
    //Route::get('/fornecedores', function () { return('Fornecedores'); })->name('app.fornecedores');    
    Route::get('/fornecedores', [ \App\Http\Controllers\ForncedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function () { return('Produtos'); })->name('app.produtos');
});

/*
Route::get('/rota1' , function() {
    echo('Rota1ss');
})->name('site.rota1');
*/

//Encaminhando parametros da Rota para um método do controlador
//Route::get('/teste/{p1}/{p2}', [ \App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

//Encaminhando parametros do controlador para a visualização ("view")
Route::get('/teste/{p1}/{p2}', [ \App\Http\Controllers\TesteController::class, 'teste'])->name('teste');


/*
Route::get('/rota2' , function() {
    //echo('Rota2');
    //Redirecionamento de rotas
    return redirect()->route('site.rota1'); //redirect feito no contexto do laravel ou seja do controlador
})->name('site.rota2');
*/

//Rota de falback (Quando o usuario tenta acessa uma rota que não existe)
Route::fallback( function() {
    echo 'A rota acessada não exite <a href="'.route('site.index').'"> Clique aqui para ir para a página inicial </a>'; 
});





//Rota passando paramentros (nome,categoria,assunto,mensagem)
// O caracter "?", define que o parametro não é obrigatório
//Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = "mensagem não fornecida") {
//    echo 'Estamos aqui: '.$nome.'  '.$categoria.'  '.$assunto.'  '.$mensagem;
//});

/*
Route::get(
    '/contato/{nome}/{categoria_id}', 
        function(
            string $nome = 'Desconhecido', 
            int $categoria_id = 1 // 1 - 'Informação'
        ) {
            echo "Estamos aqui: $nome - $categoria_id";
        }
)->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
*/