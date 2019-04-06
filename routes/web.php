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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'Categoria'), function()
{
    Route::get('/', 'CategoriaController@index');
    Route::get('/add-Categoria', 'CategoriaController@add');
    Route::post('/add-Categoria-post', 'CategoriaController@addPost');
    Route::get('/delete-Categoria/{id}', 'CategoriaController@delete');
    Route::get('/edit-Categoria/{id}', 'CategoriaController@edit');
    Route::post('/edit-Categoria-post', 'CategoriaController@editPost');
    Route::get('/change-status-Categoria/{id}', 'CategoriaController@changeStatus');
    Route::get('/view-Categoria/{id}', 'CategoriaController@view');
});

Route::group(array('prefix' => 'Produto'), function()
{
    Route::get('/', 'ProdutoController@index');
    Route::get('/add-Produto', 'ProdutoController@add');
    Route::post('/add-Produto-post', 'ProdutoController@addPost');
    Route::get('/delete-Produto/{id}', 'ProdutoController@delete');
    Route::get('/edit-Produto/{id}', 'ProdutoController@edit');
    Route::post('/edit-Produto-post', 'ProdutoController@editPost');
    Route::get('/change-status-Produto/{id}', 'ProdutoController@changeStatus');
    Route::get('/view-Produto/{id}', 'ProdutoController@view');
    Route::get('/nome','ProdutoController@pesquisarNomeProduto');
});

Route::group(array('prefix' => 'Cliente'), function()
{
    Route::get('/', 'ClienteController@index');
    Route::get('/add-Cliente', 'ClienteController@add');
    Route::post('/add-Cliente-post', 'ClienteController@addPost');
    Route::get('/delete-Cliente/{id}', 'ClienteController@delete');
    Route::get('/edit-Cliente/{id}', 'ClienteController@edit');
    Route::post('/edit-Cliente-post', 'ClienteController@editPost');
    Route::get('/change-status-Cliente/{id}', 'ClienteController@changeStatus');
    Route::get('/view-Cliente/{id}', 'ClienteController@view');
    Route::get('/nome','ClienteController@pesquisarNomeCliente');
});


Route::group(array('prefix' => 'Fornecedor'), function()
{
    Route::get('/', 'FornecedorController@index');
    Route::get('/add-Fornecedor', 'FornecedorController@add');
    Route::post('/add-Fornecedor-post', 'FornecedorController@addPost');
    Route::get('/delete-Fornecedor/{id}', 'FornecedorController@delete');
    Route::get('/edit-Fornecedor/{id}', 'FornecedorController@edit');
    Route::post('/edit-Fornecedor-post', 'FornecedorController@editPost');
    Route::get('/change-status-Fornecedor/{id}', 'FornecedorController@changeStatus');
    Route::get('/view-Fornecedor/{id}', 'FornecedorController@view');
});

Route::group(array('prefix' => 'OrdemServico'), function()
{
    Route::get('/', 'OrdemServicoController@index');
    Route::get('/add-OrdemServico', 'OrdemServicoController@add');
    Route::post('/add-OrdemServico-post', 'OrdemServicoController@addPost');
    Route::get('/delete-OrdemServico/{id}', 'OrdemServicoController@delete');
    Route::get('/edit-OrdemServico/{id}', 'OrdemServicoController@edit');
    Route::post('/edit-OrdemServico-post', 'OrdemServicoController@editPost');
    Route::get('/change-status-OrdemServico/{id}', 'OrdemServicoController@changeStatus');
    Route::get('/view-OrdemServico/{id}', 'OrdemServicoController@view');
    Route::post('/table', 'OrdemServicoController@table');
});
