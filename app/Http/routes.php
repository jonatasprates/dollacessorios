<?php

//Gestão do painel - area restrita
Route::group(['prefix' => 'painel', 'middleware' => ['auth'], 'web'], function ($route) {
    
    $route->get('/produtos', 'Painel\ProdutoController@index');
    $route->get('/produto/cadastrar', 'Painel\ProdutoController@cadastrar');
    $route->post('/produto/cadastrar', 'Painel\ProdutoController@cadastrarProduto');
    $route->get('/produto/editar/{id}', 'Painel\ProdutoController@editar');
    $route->post('/produto/editar/{id}', 'Painel\ProdutoController@editarProduto');
    $route->get('/produto/deletar/{id}', 'Painel\ProdutoController@deletar');
    $route->post('/produto/pesquisar', 'Painel\ProdutoController@pesquisar');
    
    $route->get('/categorias/', 'Painel\CategoriaController@index');
    $route->get('/categoria/cadastrar', 'Painel\CategoriaController@cadastrar');
    $route->post('/categoria/cadastrar', 'Painel\CategoriaController@cadastrarCategoria');
    $route->get('/categoria/editar/{id}', 'Painel\CategoriaController@editar');
    $route->post('/categoria/editar/{id}', 'Painel\CategoriaController@editarCategoria');
    $route->get('/categoria/deletar/{id}', 'Painel\CategoriaController@deletar');
    $route->post('/categoria/pesquisar', 'Painel\CategoriaController@pesquisar');
    
    $route->get('/', 'Painel\PainelController@index');
});

//Rota de autenticação
Route::auth();
Route::get('/home', 'HomeController@index');

//Listagem de produtos de um determinado categoria
Route::get('/categoria/{id}', 'SiteController@produtoCategoria');


Route::post('/orcamento', 'SiteController@OrcamentoEnviarEmail');



//Inicio site ligueja

Route::post('/disk/empresas', 'SitediskControll@empresas');
Route::get('/disk', 'SitediskControll@index');


//Fim site ligueja
Route::get('/detalhes/produto/{id}', 'SiteController@detalheProduto');
Route::get('/contato', 'SiteController@contato');
Route::post('/contato', 'SiteController@contatoEnviarEmail');
Route::get('/quem-somos', 'SiteController@sobre');
Route::get('/', 'SiteController@index');


