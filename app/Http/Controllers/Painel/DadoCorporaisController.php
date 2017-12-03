<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Painel\Corporai;
use App\Model\Painel\Grupovalore;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\CorporaiFormRequest;

class DadoCorporaisController extends Controller
{
    private $dadoscorporai;
    private $grupovalore;
    private $totalPag = 11;
    
    public function __construct(Corporai $dadoscorporai,Grupovalore $grupovalore){
        
        $this->dadoscorporai = $dadoscorporai;
        $this->grupovalore = $grupovalore;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Dados Corporais';
        $dadoscorporais = $this->dadoscorporai->paginate($this->totalPag);
        return view('painel.dadoscorporais.index',compact('dadoscorporais','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo Dado corporal';
        $grupovalores = $this->grupovalore->all();
        return view('painel.dadoscorporais.create-edit',compact('title','grupovalores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorporaiFormRequest $request)
    {
        $dataForm = $request->all();
     
        $insert = $this->dadoscorporai->create($dataForm);
        if ( $insert )
            return redirect()->route('dadoscorporais.index');
        else
            return redirect()->route('dadoscorporais.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dadoscorporais = $this->dadoscorporai->find($id);
        $title = "Grupo valor: {$dadoscorporai->id}";
    
        return view('painel.dadoscorporais.show',compact('dadoscorporais','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dadoscorporais = $this->dadoscorporai->find($id);
        $grupovalores = $this->grupovalore->all();
        $title = "Editar Dado corporal: {$dadoscorporai->id}";
        return view('painel.dadoscorporais.create-edit',compact('title','dadoscorporais','grupovalores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CorporaiFormRequest $request, $id)
    {
       $dataForm = $request->all();
       $dadoscorporai = $this->dadoscorporai->find($id);
       $update = $gdadoscorporai->update($dataForm);
        if ( $update )
            return redirect()->route('dadoscorporais.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('dadoscorporais.edit',$id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dadoscorporai = $this->dadoscorporai->find($id);
        $delete = $dadoscorporai->delete();
        if ( $delete )
            return redirect()->route('dadoscorporais.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('dadoscorporais.show',$id)->with(['errors' => 'Falha ao deletar']);
    }
}
