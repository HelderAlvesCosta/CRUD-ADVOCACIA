<?php
use App\Model\Painel\Advogado;
use App\Model\Painel\Corretore;
use App\Model\Painel\Requerente;
use App\Model\Painel\Processo;
use App\Model\Painel\Statu;
use App\Model\Painel\User;
use App\Model\Painel\Teste;
use App\Model\Painel\Task;

use Illuminate\Http\Request;
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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

/////////////////////
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
////////////////////

Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'));
Route::resource('/painel/requerentes', 'Painel\RequerentesController');
Route::resource('/painel/advogados', 'Painel\AdvogadosController');
Route::resource('/painel/escritorios', 'Painel\EscritoriosController');
Route::resource('/painel/corretores', 'Painel\CorretoresController');
Route::resource('/painel/status', 'Painel\StatusController');
Route::resource('/painel/processos', 'Painel\ProcessosController');
Route::resource('/painel/grupovalores', 'Painel\GrupoValoresController');
Route::resource('/painel/lesoes', 'Painel\LesoesController');
Route::resource('/painel/users', 'Painel\UsersController');
Route::resource('/painel/testes', 'Painel\TestesController');

//Route::get('/painel/testes/index',['as'=>'testes.index','uses'=>'Painel\TestesController@index']);
//Route::get('/painel/testes/create',['as'=>'testes.create','uses'=>'Painel\TestesController@create']);
//Route::post('/painel/testes/store',['as'=>'testes.store','uses'=>'Painel\TestesController@store']);
//Route::get('/painel/testes/{id}/edit',['as'=>'testes.edit','uses'=>'Painel\TestesController@edit']);
//Route::patch('/painel/testes/{id}',['as'=>'testes.update','uses'=>'Painel\TestesController@update']);
//Route::delete('/painel/testes/{id}',['as'=>'testes.destroy','uses'=>'Painel\TestesController@destroy']);
//Route::get('/painel/testes/{id}',['as'=>'testes.view','uses'=>'Painel\TestesController@view']);
//Route::get('/painel/testes/show/{id}',['as'=>'testes.show','uses'=>'Painel\TestesController@show']);


Route::get('/painel/Andamentos/index/{processo_id}',['as'=>'andamentos.index','uses'=>'Painel\AndamentosController@index']);
Route::get('/painel/Andamentos/create/{processo_id}',['as'=>'andamentos.create','uses'=>'Painel\AndamentosController@create']);
Route::post('/painel/Andamentos/store',['as'=>'andamentos.store','uses'=>'Painel\AndamentosController@store']);
Route::get('/painel/Andamentos/{processo_id}/{data}/edit',['as'=>'andamentos.edit','uses'=>'Painel\AndamentosController@edit']);
Route::patch('/painel/Andamentos/{processo_id}/{data}',['as'=>'andamentos.update','uses'=>'Painel\AndamentosController@update']);
Route::delete('/painel/Andamentos/{processo_id}/{data}',['as'=>'andamentos.destroy','uses'=>'Painel\AndamentosController@destroy']);
Route::get('/painel/Andamentos/{processo_id}',['as'=>'andamentos.view','uses'=>'Painel\AndamentosController@view']);
Route::get('/painel/Andamentos/show/{processo_id}',['as'=>'andamentos.show','uses'=>'Painel\AndamentosController@show']);

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
	$status = Statu::where ( 'descricao', 'LIKE', '%' . $q . '%')->paginate(11);
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

Route::post( '/searchUser', function () {
	$q = Input::get ( 'q' );
	$users = Statu::where ( 'name', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem dos Usuários';
                
        if (count ( $status ) > 0){
           return view('painel.users.index',compact('users','title'));
        }
        else{
            return view('painel.users.index',compact('message','title'));
        }
                
} );

Route::post( '/searchTeste', function () {
	$q = Input::get ( 'q' );
	$testes = Statu::where ( 'nome', 'LIKE', '%' . $q . '%')->paginate(11);
        $message = 'Nada encontrado. Tente pesquisar novamente !';
	$title = 'Listagem dos Testes';
                
        if (count ( $status ) > 0){
           return view('painel.testes.index',compact('testes','title'));
        }
        else{
            return view('painel.testes.index',compact('message','title'));
        }
                
} );

////////////////////////////// INICIO
        Route::get('/tasks/{task_id?}',function($task_id){
            $task = Task::find($task_id);

            return Response::json($task);
        });

        Route::post('/tasks',function(Request $request){
            $task = App\Model\Painel\Task::create($request->all());

            return Response::json($task);
        });
        
        Route::put('/tasks/{task_id?}',function(Request $request,$task_id){
            $task = Task::find($task_id);

            $task->task = $request->task;
            $task->description = $request->description;

            $task->save();

            return Response::json($task);
        });

        Route::delete('/tasks/{task_id?}',function($task_id){
            $task = Task::destroy($task_id);

            return Response::json($task);
        });
        
     //   Route::get('/', function () {
        Route::get('/painel/tasks', function () {
           $tasks = Task::all();
          return View::make('painel.tasks.index')->with('tasks',$tasks);
        
       //    return view('painel.testes.index',cocmpact('tasks'));

        });
////////////////////////////// FIM

//      Route::resource('/requerents', 'Painel\RequerentsController');

        Route::post('/requerents',function(Request $request){
            $requerente = App\Model\Painel\Requerente::create($request->all());

            return Response::json($requerente);
        });
        
        Route::post('/advogados',function(Request $request){
            $advogado = App\Model\Painel\Advogado::create($request->all());

            return Response::json($advogado);
        });
        