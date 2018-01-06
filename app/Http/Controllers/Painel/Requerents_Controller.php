<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Painel\Requerente;
use Illuminate\Validation\Rule;
use Validator;
use View;

class Requerents_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $rules =
    [
        'nome' => 'required|min:2|max:100'
     ];
    
    public function index()
    {
         return view('painel.requerentes.index',compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
         
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $requerente = new Requerente();
            $requerente->nome = $request->nome;
            $requerente->sexo = $request->sexo;
            $requerente->nacionalidade = $request->nacionalidade;
            $requerente->estado_civil = $request->estado_civil;
            $requerente->profissao = $request->profissao;
            $requerente->rg = $request->rg;
            $requerente->cpf = $request->cpf;
            $requerente->endereco = $request->endereco;
            $requerente->bairro = $request->bairro;
            $requerente->cidade = $request->cidade;
            $requerente->uf = $request->uf;
            $requerente->cep = $request->cep;
            $requerente->telefone = $request->telefone;
            $requerente->email = $request->email;
            $requerente->banco = $request->banco;
            $requerente->agencia = $request->agencia;
            $requerente->conta = $request->conta;
            $requerente->tipo = $request->tipo;
           
            $requerente->save();
            return response()->json($requerente);
        }    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
