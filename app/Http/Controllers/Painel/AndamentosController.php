<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Painel\Andamento;
use App\Model\Painel\Processo;
use App\Model\Painel\Statu;

class AndamentosController extends Controller
{
    private $andamento;
    private $processo;  
    private $statu;
    private $id;
    private $numero_processo;
    private $totalPag = 11;
 
    public function __construct(Andamento $andamento,Processo $processo,Statu $statu){
       
        $this->andamento = $andamento;
        $this->processo = $processo;
        $this->statu = $statu;
       
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      // $processo = $andamento->processo ;
       // $country = Country::where('name','frança')->get()->first();
       // echo $processo->id;   
        $this->id =$id;
        $processos = $this->processo->find($id);
        $numero_processo = $processos->numero;
       
        $title = "Andamento do Processo: {$numero_processo}";
        
        //  $andamentos = $this->andamento->paginate($this->totalPag);
        //$count = $andamentos = $this->andamento->where('processo_id',$id)->count();
        $andamentos = $this->andamento->where('processo_id',$id)->get();
      
        //  return $count;
        $status = $this->statu->all();
        return view('painel.andamentos.index',compact('andamentos','status','title','id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      //  return 'oiiiiiiiiiii';
        $title = "Cadastrar novo andamento do Processo: {$id}";
        
        $status = $this->statu->all();
        return view('painel.andamentos.create-edit',compact('title','status','id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   //     return 'hahahahahooooooo';
        $dataForm = $request->all();
        $id = $dataForm['processo_id'];   
        $insert = $this->andamento->create($dataForm);
        if ( $insert )
            return redirect()->route('andamentos.index',$id);
        else
            return redirect()->route('andamentos.create',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $andamento = $this->andamento->find($id);
        $title = "Andamento: {$andamento->cod_processo}";
    
        return view('painel.andamentos.show',compact('andamento','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $andamentoo = $this->processo->find($id);
        
        $title = "Editar andamento: {$andamento->cod_processo}";
        return view('painel.andamentos.create-edit',compact('title','andamento'));

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
       $andamento = $this->andamento->find($id);
       $update = $andamento->update($dataForm);
        if ( $update )
            return redirect()->route('andamentos.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('andamentos.edit',$id)->with(['errors' => 'Falha ao editar']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $andamento = $this->andamento->find($id);
        $delete = $andamento->delete();
        if ( $delete )
            return redirect()->route('andamentos.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('andamentos.show',$id)->with(['errors' => 'Falha ao deletar']);
    }
}
