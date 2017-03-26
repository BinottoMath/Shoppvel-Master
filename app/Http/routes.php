<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::post('/pagseguro/notification', [
    'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
    'as' => 'pagseguro.notification',
]);


//ROTAS PARA CATEGORIAS SEM LOGIN
Route::get('categoria/listar-categoria', [
        'as' => 'categoria.listar',
        'uses' => 'CategoriaController@listar'
    ]);

Route::get('categoria/teste-tree', [
        'as' => 'teste.tree',
        'uses' => 'CategoriaController@listar-tree'
    ]);


Route::post('produto/avaliar/{id}', [
        'as' => 'produto.avaliar',
        'uses' => 'ProdutoController@avaliar'
    ]);



Route::auth();

Route::get('/', 'FrenteLojaController@getIndex');

Route::get('sobre', [
    'as' => 'sobre',
    'uses' => 'FrenteLojaController@getSobre'
]);

Route::get('/', [
    'as' => 'frente',
    'uses' => 'FrenteLojaController@getIndex'
]);

Route::get('pagseguro/checkout', [
    'as' => 'pagseguro.checkout',
    'uses' => 'PedidoController@postCheckout'
]);
Route::get('categoria/{id?}', [
    'as' => 'categoria.listar',
    'uses' => 'CategoriaController@getCategoria'
]);
/*
 * ATENÇÃO para esta rota, ela deve estar antes de produto/{id}
 * para funcionar
 */
Route::any('produto/buscar', [
    'as' => 'produto.buscar',
    'uses' => 'ProdutoController@getBuscar'
]);
Route::get('produto/{id}', [
    'as' => 'produto.detalhes',
    'uses' => 'ProdutoController@getProdutoDetalhes'
]);
Route::get('imagem/arquivo/{nome}', [
    'as' => 'imagem.file',
    'uses' => 'ImagemController@getImagemFile'
]);

Route::any('imagem/arquivo/{nome}', [
    'as' => 'imagem.file',
    'uses' => 'ImagemController@getImagemFile'
]);

Route::any('carrinho/adicionar/{id}', [
    'as' => 'carrinho.adicionar',
    'uses' => 'CarrinhoController@anyAdicionar'
]);

Route::any('carrinho/remover-item/{id}', [
    'as' => 'carrinho.remover-item',
    'uses' => 'CarrinhoController@remover_item'
]);

Route::get('carrinho', [
    'as' => 'carrinho.listar',
    'uses' => 'CarrinhoController@getListar'
]);

Route::get('carrinho/esvaziar', [
    'as' => 'carrinho.esvaziar',
    'uses' => 'CarrinhoController@getEsvaziar'
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('carrinho/finalizar-compra', [
        'as' => 'carrinho.finalizar-compra',
        'uses' => 'CarrinhoController@getFinalizarCompra'
    ]);

    Route::get('cliente/dashboard', [
        'as' => 'cliente.dashboard',
        'uses' => 'ClienteController@getDashboard'
    ]);

    Route::get('cliente/pedidos/{id?}', [
        'as' => 'cliente.pedidos',
        'uses' => 'ClienteController@getPedidos'
    ]);
    Route::get('cliente/perfil', [
        'as' => 'cliente.perfil',
        'uses' => 'ClienteController@getPerfil'
    ]);
    Route::any('cliente/avaliar/{id}', [
        'as' => 'cliente.avaliar',
        'uses' => 'ClienteController@postAvaliar'
    ]);

    Route::get('admin', [
        'as' => 'admin',
        'uses' => 'AdminController@getDashboard'
    ]);
    Route::get('admin/dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@getDashboard'
    ]);
    Route::put('admin/pedido/pago/{id}', [
        'as' => 'admin.pedido.pago',
        'uses' => 'AdminController@putPedidoPago'
    ]);
    Route::put('admin/pedido/finalizado/{id}', [
        'as' => 'admin.pedido.finalizado',
        'uses' => 'AdminController@putPedidoFinalizado'
    ]);
    Route::get('admin/pedidos/{id?}', [
        'as' => 'admin.pedidos',
        'uses' => 'AdminController@getPedidos'
    ]);
    Route::get('admin/perfil', [
        'as' => 'admin.perfil',
        'uses' => 'AdminController@getPerfil'
    ]);

    Route::get('admin/sobre', [
        'as' => 'admin.sobre',
        'uses' => 'FrenteLojaController@getSobre'   
    ]);

    //INICIO ROTAS PARA CATEGORIAS   
    Route::get('admin/categoria/nova', [
        'as' => 'categoria.nova',
        'uses' => 'CategoriaController@nova'
    ]);
    Route::post('admin/categoria/salvar', [
        'as' => 'categoria.salvar',
        'uses' => 'CategoriaController@salvar'
    ]);
    Route::get('admin/categoria/alterar/{id}', [
        'as' => 'categoria.alterar',
        'uses' => 'CategoriaController@alterar'
    ]);
    Route::post('admin/categoria/excluir/{id}', [
        'as' => 'categoria.excluir',
        'uses' => 'CategoriaController@excluir'
    ]);
    Route::get('admin/categoria/confirmar_exclusao/{id}', [
        'as' => 'categoria.confirmar_exclusao',
        'uses' => 'CategoriaController@confirmar_exclusao'
    ]);
    Route::get('admin/categoria/listaradmin/', [
        'as' => 'categoria.listaradmin',
        'uses' => 'CategoriaController@listar_admin'
    ]);  
    
    //INICIO ROTAS PARA PRODUTOS
    Route::get('admin/produto/listaradmin/', [
        'as' => 'produto.listaradmin',
        'uses' => 'ProdutoController@listaradmin'
    ]);

    Route::get('admin/produto/novo/', [
        'as' => 'produto.novo',
        'uses' => 'ProdutoController@novo'
    ]);

    Route::get('admin/produto/alterar/{id}', [
        'as' => 'produto.alterar',
        'uses' => 'ProdutoController@alterar'
    ]);

    Route::get('admin/produto/confirmar_exclusao/{id}', [
        'as' => 'produto.confirmar_exclusao',
        'uses' => 'ProdutoController@confirmar_exclusao'
    ]);

    Route::post('admin/produto/salvar/', [
        'as' => 'produto.salvar',
        'uses' => 'ProdutoController@salvar'
    ]);

    Route::post('admin/produto/excluir/{id}', [
        'as' => 'produto.excluir',
        'uses' => 'ProdutoController@excluir'
    ]);  

    //INICIO ROTAS PARA Marcas
    Route::get('admin/marca/listaradmin/', [
        'as' => 'marca.listaradmin',
        'uses' => 'MarcaController@listar_admin'
    ]);
    Route::get('admin/marca/nova', [
        'as' => 'marca.nova',
        'uses' => 'MarcaController@nova'
    ]);
    Route::get('admin/marca/confirmar_exclusao/{id}', [
        'as' => 'marca.confirmar_exclusao',
        'uses' => 'MarcaController@confirmar_exclusao'
    ]);
    Route::post('admin/marca/salvar/', [
        'as' => 'marca.salvar',
        'uses' => 'MarcaController@salvar'
    ]);
    Route::get('admin/marca/alterar/{id}', [
        'as' => 'marca.alterar',
        'uses' => 'MarcaController@alterar'
    ]);
    Route::post('admin/marca/excluir/{id}', [
        'as' => 'marca.excluir',
        'uses' => 'MarcaController@excluir'
    ]);   
     
});


//Route::get('/home', 'HomeController@index');