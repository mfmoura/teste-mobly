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
Route::post('/', ['as' => 'index.index', 'uses' => 'produtos@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/site', 'produtos@index');

Route::get('/carrinho/', ['as' => 'carrinho', 'uses' => 'token_produto_controller@listCarrinho']);
Route::post('/token/adicionarProduto/', ['as' => 'token.adicionarProduto', 'uses' => 'token_produto_controller@adicionarProduto']);

// Aplicativos que precisam de login
Route::group(['middleware' => 'auth'], function () {
	Route::get('/user/usuarioInfo', ['as' => 'user.info', 'uses' => 'userInfo@recuperaInfo']);
	Route::get('/carrinho/conferir/', ['as' => 'pedido.conferirDados', 'uses' => 'userInfo@conferir']);
	Route::get('/carrinho/salvar/', ['as' => 'pedido.salvar', 'uses' => 'pedidos@salvaPedido']);
	Route::get('/user/pedidos/', ["as" => 'pedido.usuario.exibe', 'uses' => 'pedidos@exibePedidos']);
	Route::post('/user/usuarioInfo/salvar', ['as' => 'user.info.salvar', 'uses' => 'userInfo@salvaInfo']);
});

// Aplicativos admin
Route::group(['middleware' => ['auth', 'userLevel'], 'prefix' => 'admin'], function () {


	Route::get('/produtos/cadastrar', ['as' => 'produtos.cadastrar', 'uses' =>'produtos@cadastrar']);
	Route::get('/produtos/cadastrar/{id}', ['as' => 'produtos.editar', 'uses' =>'produtos@cadastrar']);
	Route::get('/produtos/cadastrar/apagarImagem/{id}', ['as' => 'produtos.apagarImagem', 'uses' =>'produtos@apagarImagem']);

	Route::get('/pedidos/', ["as" => 'pedido.admin.exibe', 'uses' => 'pedidos@exibeTodosPedidos']);
	Route::get('/categorias/', ['as' => 'categoria.list','uses' =>'categorias@list']);
	Route::get('/categorias/editar', 'categorias@editar');
	Route::get('/categorias/editar/{id}', 'categorias@editar');
	Route::get('/categorias/apagar/{id}', 'categorias@apagar');
	Route::post('/categorias/salvar/', 'categorias@editarSalvar');

	Route::post('/produtos/cadastrar/salvar', ['as' => 'produtos.salvar', 'uses' => 'produtos@salvarCadastro']);
});