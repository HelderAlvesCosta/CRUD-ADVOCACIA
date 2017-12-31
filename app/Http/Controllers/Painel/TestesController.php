<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Model\Painel\Teste;

class TestesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $teste;
    private $totalPag = 10;
    
    public function __construct(Teste $teste){
        
        $this->teste = $teste;
    }
    
    public function index()
    {
        $title = 'Listagem dos Testes';
       $testes = $this->teste->paginate($this->totalPag);

        return view('painel.testes.index',compact('testes','title'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $title ='Cadastrar novo teste';
        return view('painel.testes.create-edit',compact('title'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TesteFormRequest $request)
    {
     
                    $data = ['success' =>'Data saved successfully'];

   //      try {
   //         $dataForm = $request->all();
   //         $insert = $this->teste->create($dataForm);
//
//            $data = ['success' =>'Data saved successfully'];
//        } catch (\Exception $e) {
//            $data = ['error' =>$e->getMessage()];
//        }
 return response()
            ->json($data)
            ->withCallback($request->input('callback'));
                    
      //  return Response::json($data);
      
   //     $dataForm = $request->all();
   //     $insert = $this->teste->create($dataForm);
   //     if ( $insert )
   //         return redirect()->route('testes.index');
   //     else
   //         return redirect()->route('testes.create');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teste = $this->teste->find($id);
        $title = "Teste: {$user->nome}";
    
        return view('painel.testes.show',compact('teste','title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teste = $this->teste->find($id);
        $title = "Editar teste: {$teste->nome}";
        return view('painel.testes.create-edit',compact('title','teste'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TesteFormRequest $request, $id)
    {
        
         try {
            $dataForm = $request->all();
            $teste = $this->teste->find($dataForm['id']);
            $data = ['success' =>'Data saved successfully'];
        } catch (\Exception $e) {
            $data = ['error' =>$e->getMessage()];
        }
        return Response::json($data);
        
        
  //     $dataForm = $request->all();
  //     $teste = $this->teste->find($id);
  //     $update = $teste->update($dataForm);
  //      if ( $update )
  //          return redirect()->route('testes.index');
  //      else
           //- return redirect()->back(); 
 //           return redirect()->route('testes.edit',$id)->with(['errors' => 'Falha ao editar']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teste = $this->teste->find($id);
        $delete = $teste->delete();
        if ( $delete )
            return redirect()->route('testes.index');
        else
           //- return redirect()->back(); 
            return redirect()->route('testes.show',$id)->with(['errors' => 'Falha ao deletar']);

    }
}
