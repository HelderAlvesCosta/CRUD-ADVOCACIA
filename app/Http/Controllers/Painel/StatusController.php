<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Painel\Statu;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Http\Requests\Painel\StatuFormRequest;

class StatusController extends Controller
{
    
    private $statu;
    private $totalPag = 11;
    
    public function __construct(Statu $statu){
        
        $this->statu = $statu;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos Status';
        $status = $this->statu->paginate($this->totalPag);
        return view('painel.status.index',compact('status','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar novo Status';
        return view('painel.status.create-edit',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatuFormRequest $request)
    {
        
        $dataForm = $request->all();
     
        $insert = $this->statu->create($dataForm);
        if ( $insert )
            return redirect()->route('status.index');
        else
            return redirect()->route('status.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statu = $this->statu->find($id);
        $title = "Status: {$statu->descricao}";
    
        return view('painel.status.show',compact('statu','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statu = $this->statu->find($id);
        
        $title = "Editar statua: {$statu->descricao}";
        return view('painel.status.create-edit',compact('title','statu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatuFormRequest $request, $id)
    {
       $dataForm = $request->all();
       $statu = $this->statu->find($id);
       $update = $statu->update($dataForm);
        if ( $update )
            return redirect()->route('status.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('status.edit',$id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statu = $this->statu->find($id);
        $delete = $statu->delete();
        if ( $delete )
            return redirect()->route('status.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('status.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}
