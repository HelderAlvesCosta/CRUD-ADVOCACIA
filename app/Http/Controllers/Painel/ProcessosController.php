<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Painel\Processo;
use App\Model\Painel\Requerente;
use App\Model\Painel\Advogado;
use App\Model\Painel\Corporai;
use App\Model\Painel\Processolesoe;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\ProcessoFormRequest;


class ProcessosController extends Controller
{
    
    private $processo;
    private $requerente;  
    private $advogado;
    private $processolesoe;
    private $corporai;
  
    private $totalPag = 11;
    
    public function __construct(Processo $processo,Requerente $requerente,Advogado $advogado,Processolesoe $processolesoe,Corporai $corporai){
        
        $this->processo = $processo;
        $this->requerente = $requerente;
        $this->advogado = $advogado;
        $this->processolesoe = $processolesoe;
        $this->corporai = $corporai;

    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Processos';
        $processos = $this->processo->paginate($this->totalPag);
        return view('painel.processos.index',compact('processos','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo processo';
        $requerentes = $this->requerente->all();
        $advogados = $this->advogado->all();
        $corporais = $this->corporai->all();
      
        return view('painel.processos.create-edit',compact('title','requerentes','advogados','corporais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessoFormRequest $request)
    {
        
        $dataForm = $request->all();
        $insert = $this->processo->create($dataForm);
        if ( $insert )
            return redirect()->route('processos.index');
        else
            return redirect()->route('processos.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processo = $this->processo->find($id);
        $title = "Processo: {$processo->nome}";
    
        return view('painel.processos.show',compact('processo','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $processo = $this->processo->find($id);
        
        $title = "Editar processo: {$processo->nome}";
        $requerentes = $this->requerente->all();
        $advogados = $this->advogado->all();
        $corporais = $this->corporai->all();
        $processolesoes = $this->processolesoe->where('processo_id',$id)->get();
             
        return view('painel.processos.create-edit',compact('title','processo','requerentes','advogados','processolesoes','corporais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcessoFormRequest $request, $id)
    {

       $dataForm = $request->all();
        $processo = $this->processo->find($id);
       $delete = $this->processolesoe->where('processo_id',$id)->delete();
     //  return $dataForm['valor_condenação_aud'];
       foreach($dataForm['opcoes'] as $item){
          $this->processolesoe->insert(['processo_id' => $id,'corporai_id' => $item]);
       }    
       $processo = $this->processo->find($id);
       $update = $processo->update($dataForm);
        if ( $update )
            return redirect()->route('processos.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('processos.edit',$id)->with(['errors' => 'Falha ao editar']);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processo = $this->processo->find($id);
        $delete = $processo->delete();
        if ( $delete )
            return redirect()->route('processos.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('processos.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}
