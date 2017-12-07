<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Painel\Requerente;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\RequerenteFormRequest;


class RequerentesController extends Controller
{
    
    private $requerente;
    private $totalPag = 11;
    
    public function __construct(Requerente $requerente){
        
        $this->requerente = $requerente;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Requerentes';
        $requerentes = $this->requerente->paginate($this->totalPag);
        return view('painel.requerentes.index',compact('requerentes','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo requerente';
        $estado_civis =['Solteiro','Casado','Separado','Divorciado','Viúvo'];
        $sexos =['Masculino','Feminino'];
        $nacionalidades =['Brasileira','Estrangeira'];
       
        return view('painel.requerentes.create-edit',compact('title','estado_civis','sexos','nacionalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequerenteFormRequest $request)
    {
        
        $dataForm = $request->all();
     
        $insert = $this->requerente->create($dataForm);
        if ( $insert )
            return redirect()->route('requerentes.index');
        else
            return redirect()->route('requerente.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requerente = $this->requerente->find($id);
        $title = "Requerente: {$requerente->nome}";
    
        return view('painel.requerentes.show',compact('requerente','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requerente = $this->requerente->find($id);
        
        $title = "Editar requerente: {$requerente->nome}";
        $estado_civis =['Solteiro','Casado','Separado','Divorciado','Viúvo'];
        $sexos =['Masculino','Feminino'];
        $nacionalidades =['Brasileira','Estrangeira'];
        return view('painel.requerentes.create-edit',compact('title','requerente','sexos','estado_civis','nacionalidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequerenteFormRequest $request, $id)
    {
       $dataForm = $request->all();
       $requerente = $this->requerente->find($id);
       $update = $requerente->update($dataForm);
        if ( $update )
            return redirect()->route('requerentes.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('requerentes.edit',$id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requerente = $this->requerente->find($id);
        $delete = $requerente->delete();
        if ( $delete )
            return redirect()->route('requerentes.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('requerentes.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}
