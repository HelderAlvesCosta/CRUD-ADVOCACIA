<?php
use App\Model\Painel\Advogado;
use App\Model\Painel\Corretore;
use App\Model\Painel\Requerente;
use App\Model\Painel\Processo;
use App\Model\Painel\Statu;
use Illuminate\Support\Facades\Input;
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
Route::resource('/painel/grupovalores', 'Painel\GrupoValoresController');
Route::resource('/painel/lesoes', 'Painel\LesoesController');


Route::get('/painel/Andamentos/index/{id}',['as'=>'andamentos.index','uses'=>'Painel\AndamentosController@index']);
Route::get('/painel/Andamentos/create/{id}',['as'=>'andamentos.create','uses'=>'Painel\AndamentosController@create']);
Route::post('/painel/Andamentos/store',['as'=>'andamentos.store','uses'=>'Painel\AndamentosController@store']);
Route::get('/painel/Andamentos/edit/{id}',['as'=>'andamentos.edit','uses'=>'Painel\AndamentosController@edit']);
Route::patch('/painel/Andamentos/{id}',['as'=>'andamentos.update','uses'=>'Painel\AndamentosController@update']);
Route::delete('/painel/Andamentos/{id}',['as'=>'andamentos.destroy','uses'=>'Painel\AndamentosController@destroy']);
Route::get('/painel/Andamentos/{id}',['as'=>'andamentos.view','uses'=>'Painel\AndamentosController@view']);
Route::get('/painel/Andamentos/show/{id}',['as'=>'andamentos.show','uses'=>'Painel\AndamentosController@show']);

Route::post( '/searchAdvogado', function () {
	$q = Input::get ( 'q' );
	$advogados = Advogado::where ( 'nome', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem dos Advogados';
                
        if (count ( $advogados ) > 0){
           return view('painel.advogados.index',compact('advogados','title'));
        }
        else{
            return view('painel.advogados.index',compact('message','title'));
        }
                
} );

Route::post( '/searchCorretore', function () {
	$q = Input::get ( 'q' );
	$corretores = Corretore::where ( 'nome', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem dos Corretores';
                
        if (count ( $corretores ) > 0){
           return view('painel.corretores.index',compact('corretores','title'));
        }
        else{
            return view('painel.corretores.index',compact('message','title'));
        }
                
} );

Route::post( '/searchRequerente', function () {
	$q = Input::get ( 'q' );
	$requerentes = Requerente::where ( 'nome', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem dos Requerentes';
                
        if (count ( $requerentes ) > 0){
           return view('painel.requerentes.index',compact('requerentes','title'));
        }
        else{
            return view('painel.requerentes.index',compact('message','title'));
        }
                
} );

Route::post( '/searchProcesso', function () {
	$q = Input::get ( 'q' );
	$processos = Processo::where ( 'numero', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem dos Processos';
                
        if (count ( $processos ) > 0){
           return view('painel.processos.index',compact('processos','title'));
        }
        else{
            return view('painel.processos.index',compact('message','title'));
        }
                
} );

Route::post( '/searchStatu', function () {
	$q = Input::get ( 'q' );
	$status = Statu::where ( 'nome', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem dos Status';
                
        if (count ( $status ) > 0){
           return view('painel.status.index',compact('status','title'));
        }
        else{
            return view('painel.status.index',compact('message','title'));
        }
                
} );

Route::post( '/searchLesoe', function () {
	$q = Input::get ( 'q' );
	$lesoes = Statu::where ( 'nome', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem das Lesões';
                
        if (count ( $status ) > 0){
           return view('painel.lesoes.index',compact('lesoes','title'));
        }
        else{
            return view('painel.lesoes.index',compact('message','title'));
        }
                
} );