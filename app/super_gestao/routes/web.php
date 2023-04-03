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
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);

//Rota sobre-nos
Route::get('/sobre-nos', [ \App\Http\Controllers\SobreNosController::class, 'sobreNos']);

//Rota Contato
Route::get('/contato', [ \App\Http\Controllers\ContatoController::class, 'contato']);


//Rota passando paramentros (nome,categoria,assunto,mensagem)
// O caracter "?", define que o parametro não é obrigatório
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = "mensagem não fornecida") {
    echo 'Estamos aqui: '.$nome.'  '.$categoria.'  '.$assunto.'  '.$mensagem;
});