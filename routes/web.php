<?php

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

Route::get('/', ['as' => 'index.index', 'uses' => 'produtos@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/site', 'produtos@index');

Route::get('/carrinho/', ['as' => 'carrinho', 'uses' => 'token_produto_controller@listCarrinho']);
Route::post('/token/adicionarProduto/', ['as' => 'token.adicionarProduto', 'uses' => 'token_produto_controller@adicionarProduto']);

Route::group(['middleware' => ['auth', 'userLevel'], 'prefix' => 'admin'], function () {


	Route::get('/produtos/cadastrar', ['as' => 'produtos.cadastrar', 'uses' =>'produtos@cadastrar']);
	Route::get('/produtos/cadastrar/{id}', ['as' => 'produtos.editar', 'uses' =>'produtos@cadastrar']);
	Route::get('/produtos/cadastrar/apagarImagem/{id}', ['as' => 'produtos.apagarImagem', 'uses' =>'produtos@apagarImagem']);

	Route::get('/categorias/', ['as' => 'categoria.list','uses' =>'categorias@list']);
	Route::get('/categorias/editar', 'categorias@editar');
	Route::get('/categorias/editar/{id}', 'categorias@editar');
	Route::get('/categorias/apagar/{id}', 'categorias@apagar');
	Route::post('/categorias/salvar/', 'categorias@editarSalvar');

	Route::post('/produtos/cadastrar/salvar', ['as' => 'produtos.salvar', 'uses' => 'produtos@salvarCadastro']);
});