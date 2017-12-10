@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('requerentes.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Requerente: <b> {{$requerente->nome or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($requerente) ) 
    {!!Form::model($requerente,['route' => ['requerentes.update',$requerente->id],'class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'requerentes.store','class' => 'form-horizontal'])!!} 
@endif

 <input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dados do Requerente</div>

                <div class="panel-body">

                       <div class="form-group">
                            <label for="nome" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{$requerente->nome or old('nome')}}" required>

                            </div>
                        </div>
                         <div class="form-group">
                            <label for="sexo" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Sexo</label>

                            <div class="col-md-6">
                            <select data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                @foreach($sexos as $sexo)
                                    <option value='{{$sexo}}' 
                                            @if(isset($requerente) && $requerente->sexo == $sexo)
                                                selected
                                            @endif
                                            >{{$sexo}}</option>
                            @endforeach
                            </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nacionalidade" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Nacionalidade</label>

                            <div class="col-md-6">
                            <select data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                @foreach($nacionalidades as $nacionalidade)
                                    <option value='{{$nacionalidade}}' 
                                            @if(isset($requerente) && $requerente->nacionalidade == $nacionalidade)
                                                selected
                                            @endif
                                            >{{$nacionalidade}}</option>
                            @endforeach
                            </select> 
                        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado_civil" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Estado civil</label>

                            <div class="col-md-6">
                            <select data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                @foreach($estado_civis as $estado_civil)
                                    <option value='{{$estado_civil}}' 
                                            @if(isset($requerente) && $requerente->estado_civil == $estado_civil)
                                                selected
                                            @endif
                                            >{{$estado_civil}}</option>
                            @endforeach
                            </select> 
                        
                            </div>
                        </div>

                
                        <div class="form-group">
                            <label for="profissao" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Profissão</label>

                            <div class="col-md-6">
                                <input id="profissao" type="text" class="form-control" name="profissao" value="{{$requerente->profissao or old('profissao')}}" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rg" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>RG</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" name="rg" value="{{$requerente->rg or old('rg')}}" required>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cpf" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control cpf" name="cpf" value="{{$requerente->cpf or old('cpf')}}" required>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="endereco" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{$requerente->endereco or old('endereco')}}" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="bairro" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{$requerente->bairro or old('bairro')}}" required>

                            </div>
                        </div>
                 
                             <div class="form-group">
                            <label for="uf" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>UF</label>

                            <div class="col-md-6">
                                <select id="uf" type="text" class="chosen-select-width" name="uf" value="{{$advogado->uf or old('uf')}}"></select>
                            </div>
                        </div>
                     <div class="form-group">
                            <label for="cidade" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Cidade</label>

                            <div class="col-md-6">
                                <select id="cidade" type="text" class="form-control" name="cidade" value="{{$advogado->cidade or old('cidade')}}"></select>
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
                                <input id="cep" type="text" class="form-control cep" name="cep" value="{{$requerente->cep or old('cep')}}" required>

                            </div>
                        </div>
                       
                    
                    
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control tel" name="telefone" value="{{$requerente->nome or old('telefone')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                            @if( isset($requerente) ) 
                                <input type="email"  class="form-control" value="{{$requerente->email or old('email')}}" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @else
                                <input type="email"  class="form-control" value="default@example.com" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @endif
                           
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="banco" class="col-md-4 control-label">Banco</label>

                            <div class="col-md-6">
                                <input id="banco" type="text" class="form-control" name="banco" value="{{$requerente->banco or old('banco')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="agencia" class="col-md-4 control-label">Agência</label>

                            <div class="col-md-6">
                                <input id="agencia" type="text" class="form-control" name="agencia" value="{{$requerente->agencia or old('agencia')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="conta" class="col-md-4 control-label">Conta</label>

                            <div class="col-md-6">
                                <input id="conta" type="text" class="form-control" name="conta" value="{{$requerente->conta or old('conta')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$requerente->tipo or old('tipo')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                      Enviar
                                </button>
                            </div>
                        </div>
                        {!!Form::close(['route' => 'requerentes.store','class' => 'form'])!!} 
                       
                       
                </div>
            </div>
            
            
        </div>
    </div>
</div>


@endsection