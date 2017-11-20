<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Painel\Advogado;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\AdvogadoFormRequest;

class AdvogadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $advogado;
    private $totalPag = 11;
    private $uf = ['Ceará','Paraíba'];
    
    public function __construct(Advogado $advogado){
        
        $this->advogado = $advogado;
    }

    
    public function index()
    {
        $title = 'Listagem dos Advogados';
        $advogados = $this->advogado->paginate($this->totalPag);
        $uf = $this->uf;
        return view('painel.advogados.index',compact('advogados','title','uf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo advogado';
        $uf = $this->uf;        
        return view('painel.advogados.create-edit',compact('title','uf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvogadoFormRequest $request)
    {
        $dataForm = $request->all();
     
        $insert = $this->advogado->create($dataForm);
        if ( $insert )
            return redirect()->route('advogados.index');
        else
            return redirect()->route('advogados.create');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advogado = $this->advogado->find($id);
        $title = "Advogado: {$advogado->nome}";
    
        return view('painel.advogados.show',compact('advogado','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advogado = $this->advogado->find($id);
        
        $title = "Editar advogado: {$advogado->nome}";
        $uf = $this->uf;
        return view('painel.advogados.create-edit',compact('title','advogado','uf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvogadoFormRequest $request, $id)
    {
       $dataForm = $request->all();
       $advogado = $this->advogado->find($id);
       $update = $advogado->update($dataForm);
        if ( $update )
            return redirect()->route('advogados.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('advogados.edit',$id)->with(['errors' => 'Falha ao editar']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advogado = $this->advogado->find($id);
        $delete = $advogado->delete();
        if ( $delete )
            return redirect()->route('advogados.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('advogados.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}
