<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Painel\Grupovalore;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\GrupoValorFormRequest;


class GrupoValoresController extends Controller
{
    private $grupovalore;
    private $totalPag = 11;
    
    public function __construct(Grupovalore $grupovalore){
        
        $this->grupovalore = $grupovalore;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Grupos de Valores';
        $grupovalores = $this->grupovalore->paginate($this->totalPag);
        return view('painel.grupovalores.index',compact('grupovalores','title'));   
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo grupo de valor';
        return view('painel.grupovalores.create-edit',compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
     
        $insert = $this->grupovalore->create($dataForm);
        if ( $insert )
            return redirect()->route('grupovalores.index');
        else
            return redirect()->route('grupovalores.create');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupovalore = $this->grupovalore->find($id);
        $title = "Grupo valor: {$grupovalore->id}";
    
        return view('painel.grupovalores.show',compact('grupovalore','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupovalore = $this->grupovalore->find($id);
        $title = "Editar grupo de valor: {$grupovalore->id}";
        return view('painel.grupovalores.create-edit',compact('title','grupovalore'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $dataForm = $request->all();
       $grupovalore = $this->grupovalore->find($id);
       $update = $grupovalore->update($dataForm);
        if ( $update )
            return redirect()->route('grupovalores.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('grupovalores.edit',$id)->with(['errors' => 'Falha ao editar']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupovalore = $this->grupovalore->find($id);
        $delete = $grupovalore->delete();
        if ( $delete )
            return redirect()->route('grupovalores.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('grupovalores.show',$id)->with(['errors' => 'Falha ao deletar']);
   
    }
}
