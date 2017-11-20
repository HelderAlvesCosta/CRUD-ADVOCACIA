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
/*
 Route::group(['prefix' => 'painel',  'middleware' => 'auth'], function () {
   
   Route::get('/users', function () {
    return 'Controle de usuarios';
   });
   Route::get('/financeiro', function () {
    return 'Financeiro';
   });
    Route::get('/', function () {
    return 'Dashboard';
   });
});

Route::get('/login', function () {
    return 'Form login';
   });  

Route::get('/categoria2/{idCategoria?}', function ($idCategoria=null) {
    return "posts da categoria {$idCategoria}";
    
});

Route::get('/categoria/{idCategoria}/nome-fixo/{prm2}', function ($idCategoria,$prm2) {
    return "posts da categoria {$idCategoria} - {$prm2}";
    
});

Route::get('/nome/nome2/nome3', function () {
    return 'Rota grande';
})->name('rota.nomeada');

Route::any('/any', function () {
    return 'Rout any';
});

Route::match(['get','post'],'/match', function () {
    return 'Rout match';
});

Route::post('/post', function () {
    return 'Rout post';
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::get('/empresa', function () {
    return view('empresa');
});


//Route::get('/', function () {
//    return redirect('/nome/nome2/nome3');
//});

Route::get('/', function () {
    return redirect()->route('rota.nomeada');
});


Route::get('/', function () {
    return view('welcome');
});
// Vai direto pro index() de ProdutoController
Route::get('/', 'SiteController@index');
});

 * Route::resource('photo', 'PhotoController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);

 * Route::get('/', function () {
    return view('welcome');
})->middleware('auth');*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('/painel/advogados', 'Painel\AdvogadosController');
Route::resource('/painel/escritorios', 'Painel\EscritoriosController');
Route::resource('/painel/corretores', 'Painel\CorretoresController');
Route::resource('/painel/requerentes', 'Painel\RequerentesController');
Route::resource('/painel/status', 'Painel\StatusController');
Route::resource('/painel/processos', 'Painel\ProcessosController');

Route::get('/painel/Andamentos/index/{id}',['as'=>'andamentos.index','uses'=>'Painel\AndamentosController@index']);
Route::get('/painel/Andamentos/create/{id}',['as'=>'andamentos.create','uses'=>'Painel\AndamentosController@create']);
Route::post('/painel/Andamentos/store',['as'=>'andamentos.store','uses'=>'Painel\AndamentosController@store']);
Route::get('/painel/Andamentos/edit/{id}',['as'=>'andamentos.edit','uses'=>'Painel\AndamentosController@edit']);
Route::patch('/painel/Andamentos/{id}',['as'=>'andamentos.update','uses'=>'Painel\AndamentosController@update']);
Route::delete('/painel/Andamentos/{id}',['as'=>'andamentos.destroy','uses'=>'Painel\AndamentosController@destroy']);
Route::get('/painel/Andamentos/{id}',['as'=>'andamentos.view','uses'=>'Painel\AndamentosController@view']);
Route::get('/painel/Andamentos/show/{id}',['as'=>'andamentos.show','uses'=>'Painel\AndamentosController@show']);

