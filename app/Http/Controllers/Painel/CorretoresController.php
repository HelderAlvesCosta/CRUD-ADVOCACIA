<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Painel\Corretore;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\CorretoreFormRequest;

class CorretoresController extends Controller
{
    
    private $corretore;
    private $totalPag = 10;
    
    public function __construct(Corretore $corretore){
        
        $this->corretore = $corretore;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Corretores';
        $corretores = $this->corretore->paginate($this->totalPag);
        return view('painel.corretores.index',compact('corretores','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo corretor';
        $bancos =['Caixa Economica','Banco do Brasil','Bradesco','Itaú','Santander',
            'HSBC','Banrisul','BNB','Banestes','CitiBank','Banco da Amazônia','BRB',
            'Safra','BicBanco'];

        return view('painel.corretores.create-edit',compact('title','bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorretoreFormRequest $request)
    {
        
        $dataForm = $request->all();
     
        $insert = $this->corretore->create($dataForm);
        if ( $insert )
            return redirect()->route('corretores.index');
        else
            return redirect()->route('corretores.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corretore = $this->corretore->find($id);
        $title = "Corretor: {$corretore->nome}";
    
        return view('painel.corretores.show',compact('corretore','title'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corretore = $this->corretore->find($id);
        
        $title = "Editar corretor: {$corretore->nome}";
        $bancos =['Caixa Economica','Banco do Brasil','Bradesco','Itaú','Santander',
            'HSBC','Banrisul','BNB','Banestes','CitiBank','Banco da Amazônia','BRB',
            'Safra','BicBanco'];

        return view('painel.corretores.create-edit',compact('title','corretore','bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CorretoreFormRequest $request, $id)
    {
       $dataForm = $request->all();
       $corretore = $this->corretore->find($id);
       $update = $corretore->update($dataForm);
        if ( $update )
            return redirect()->route('corretores.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('corretores.edit',$id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corretore = $this->corretore->find($id);
        $delete = $corretore->delete();
        if ( $delete )
            return redirect()->route('corretores.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('corretores.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}
