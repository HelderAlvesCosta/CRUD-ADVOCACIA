@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg" align="center">
    <a href="{{route('corretores.index')}}" > <span class='glyphicon glyphicon-fast-backward'> </a>
    Gestão Corretor: <font style="color:red;" size="3"> <b>{{$corretore->nome or '<Novo>'}}</b> </font>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($corretore) ) 
    {!!Form::model($corretore,['route' => ['corretores.update',$corretore->id],'id' => 'form_corretor','class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'corretores.store','id' => 'form_corretor','class' => 'form-horizontal'])!!} 
@endif

<input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><font style="color:red;" size="3"> <b>Dados do Corretor</b> </font></div>

                <div class="panel-body">

                       <div class="form-group">
                            <label for="nome" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{$corretore->nome or old('nome')}}" required>

                            </div>
                        </div>
                         <div class="form-group">
                            <label for="rg" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>RG</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" name="rg" value="{{$corretore->rg or old('rg')}}" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpf" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control cpf" name="cpf" value="{{$corretore->cpf or old('cpf')}}" required>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="endereco" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{$corretore->endereco or old('endereco')}}" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="bairro" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{$corretore->bairro or old('bairro')}}" required>

                            </div>
                        </div>
                     
                            <div class="form-group">
                            <label for="uf" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>UF</label>

                            <div class="col-md-6">
                                <select id="uf" type="text" class="chosen-select-width" name="uf" value="{{$corretore->uf or old('uf')}}" required></select>
                            </div>
                        </div>
                     <div class="form-group">
                            <label for="cidade" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Cidade</label>

                            <div class="col-md-6">
                                <select id="cidade" type="text" class="form-control" name="cidade" value="{{$corretore->cidade or old('cidade')}}" required></select>
                            </div>
                        </div>
                        
                
    <script language="JavaScript" type="text/javascript" charset="utf-8">
      new dgCidadesEstados({
        cidade: document.getElementById('cidade'),
        estado: document.getElementById('uf')
      })
    </script>

                     
                        <div class="form-group">
                            <label for="cep" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>CEP</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control cep" name="cep" value="{{$corretore->cep or old('cep')}}" required>

                            </div>
                        </div>
                       
                    
                    
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control tel" name="telefone" value="{{$corretore->telefone or old('telefone')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                            @if( isset($corretore) ) 
                                <input type="email"  class="form-control" value="{{$corretore->email or old('email')}}" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @else
                                <input type="email"  class="form-control" value="default@example.com" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @endif
                           
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="comissao" class="col-md-4 control-label">Comissão</label>

                            <div class="col-md-6">
                                <input id="comissao" type="text" class="form-control" name="comissao" value="{{$corretore->comissao or old('comissao')}}" required> 
                          
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="banco" class="col-md-4 control-label">Banco</label>

                            <div class="col-md-6">
                              <!--  <input id="banco" type="text" class="form-control" name="banco" value="{{$corretore->banco or old('banco')}}"> -->
                                <select id="banco" name="banco" data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                <option>Selecione um banco</option>
                                @foreach($bancos as $banco)
                                    <option value='{{$banco}}' 
                                            @if(isset($corretore) && $corretore->banco == $banco)
                                                selected
                                            @endif
                                            >{{$banco}}</option>
                                @endforeach
                                </select> 
                         
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="agencia" class="col-md-4 control-label">Agência</label>

                            <div class="col-md-6">
                                <input id="agencia" name="agencia" type="text" class="form-control" name="agencia" value="{{$corretore->agencia or old('agencia')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="conta" class="col-md-4 control-label">Conta</label>

                            <div class="col-md-6">
                                <input id="conta" name="conta"  type="text" class="form-control" name="conta" value="{{$corretore->conta or old('conta')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$corretore->tipo or old('tipo')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Enviar
                                </button>
                            </div>
                        </div>
                        {!!Form::close(['route' => 'corretores.store','class' => 'form'])!!} 
                       
                       
                </div>
            </div>
            
            
        </div>
    </div>
</div>


@endsection