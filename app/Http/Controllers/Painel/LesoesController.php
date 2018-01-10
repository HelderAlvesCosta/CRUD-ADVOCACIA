<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Painel\Lesoe;
use App\Model\Painel\Grupovalore;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\LesoeFormRequest;

class LesoesController extends Controller
{
    
    private $lesoe;
    private $grupovalore;
    private $totalPag = 10;
    
    public function __construct(Lesoe $lesoe,Grupovalore $grupovalore){
        
        $this->lesoe = $lesoe;
        $this->grupovalore = $grupovalore;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem das Lesões';
        $lesoes = $this->lesoe->paginate($this->totalPag);
        return view('painel.lesoes.index',compact('lesoes','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar nova Lesão';
        $grupovalores = $this->grupovalore->all();
        return view('painel.lesoes.create-edit',compact('title','grupovalores'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LesoeFormRequest $request)
    {
        $dataForm = $request->all();
     
        $insert = $this->lesoe->create($dataForm);
        if ( $insert )
            return redirect()->route('lesoes.index');
        else
            return redirect()->route('lesoes.create');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesoe = $this->lesoe->find($id);
        $title = "Grupo valor: {$lesoe->id}";
    
        return view('painel.lesoes.show',compact('lesoe','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesoe = $this->lesoe->find($id);
        $grupovalores = $this->grupovalore->all();
        $title = "Editar Lesão: {$lesoe->id}";
        return view('painel.lesoes.create-edit',compact('title','lesoe','grupovalores'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LesoeFormRequest $request, $id)
    {
       $dataForm = $request->all();
       $lesoe = $this->lesoe->find($id);
       $update = $lesoe->update($dataForm);
        if ( $update )
            return redirect()->route('lesoes.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('lesoes.edit',$id)->with(['errors' => 'Falha ao editar']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesoe = $this->lesoe->find($id);
        $delete = $lesoe->delete();
        if ( $delete )
            return redirect()->route('lesoes.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('lesoes.show',$id)->with(['errors' => 'Falha ao deletar']);
   
    }
}
