<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Painel\Escritorio;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\EscritorioFormRequest;


class EscritoriosController extends Controller
{
    
    private $escritorio;
    private $totalPag = 10;
    
    public function __construct(Escritorio $escritorio){
        
        $this->escritorio = $escritorio;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Escritorios'; 
        $escritorios = $this->escritorio->paginate($this->totalPag);
        return view('painel.escritorios.index',compact('escritorios','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo escritorio';
        return view('painel.escritorios.create-edit',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscritorioFormRequest $request)
    {
        
        $dataForm = $request->all();
     
        $insert = $this->escritorio->create($dataForm);
        if ( $insert )
            return redirect()->route('escritorios.index');
        else
            return redirect()->route('escritorios.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $escritorio = $this->escritorio->find($id);
        $title = "Escritorio: {$escritorio->nome}";
    
        return view('painel.escritorios.show',compact('escritorio','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $escritorio = $this->escritorio->find($id);
        
        $title = "Editar escritorio: {$escritorio->nome}";
        return view('painel.escritorios.create-edit',compact('title','escritorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EscritorioFormRequest $request, $id)
    {
       $dataForm = $request->all();
       $escritorio = $this->escritorio->find($id);
       $update = $escritorio->update($dataForm);
        if ( $update )
            return redirect()->route('home');
        else
           //- return redirect()->back(); 
            return redirect()->route('home',$id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $escritorio = $this->escritorio->find($id);
        $delete = $escritorio->delete();
        if ( $delete )
            return redirect()->route('escritorios.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('escritorios.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}
