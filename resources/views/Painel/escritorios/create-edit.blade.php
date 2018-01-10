@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg" align="center">
    <a href="{{route('escritorios.index')}}" > </a>
    Gestão Escritório: <font style="color:red;" size="3"> <b>{{'<Alterar>'}}</b> </font>
</h1>


@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif
@if( isset($escritorio) ) 
    {!!Form::model($escritorio,['route' => ['escritorios.update',$escritorio->id],'class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'escritorios.store','class' => 'form-horizontal'])!!} 
@endif

<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading"><font style="color:red;" size="3"> <b>Dados do Escritório</b> </font>
                    </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label for="nome" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Nome</label>

                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control" name="nome" value="{{$escritorio->nome or old('nome')}}" required>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label for="uf" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>UF</label>

                        <div class="col-md-6">
                            <select id="uf" type="text" class="chosen-select-width" name="uf" value="{{$escritorio->uf or old('uf')}}"></select>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label for="cidade" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Cidade</label>

                        <div class="col-md-6">
                             <select id="cidade" type="text" class="form-control" name="cidade" value="{{$escritorio->cidade or old('cidade')}}"></select>
                        </div>
                    </div>
                        <script language="JavaScript" type="text/javascript" charset="utf-8">
                            new dgCidadesEstados({
                            cidade: document.getElementById('cidade'),
                            estado: document.getElementById('uf')
                            })
                        </script>
                  
                    <div class="form-group">
                        <label for="bairro" class="col-md-4 control-label">Bairro</label>

                        <div class="col-md-6">
                            <input id="bairro" type="text" class="form-control" value="{{$escritorio->bairro or old('bairro')}}" name="bairro" required>

                        </div>
                    </div>
               
                    <div class="form-group">
                         <label for="endereco" class="col-md-4 control-label">Endereço</label>

                        <div class="col-md-6">
                            <input id="endereco" type="text" class="form-control" name="endereco" value="{{$escritorio->endereco or old('endereco')}}" required>

                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label for="cep" class="col-md-4 control-label">CEP</label>

                        <div class="col-md-6">
                            <input id="cep" type="text" class="form-control" name="cep" value="{{$escritorio->cep or old('cep')}}" required>

                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="telefone" class="col-md-4 control-label">Telefone</label>

                        <div class="col-md-6">
                            <input id="telefone" type="text" class="form-control" name="telefone" value="{{$escritorio->telefone or old('telefone')}}" required>
                        </div>
                    </div>
                 
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            @if( isset($escritorio) ) 
                                <input type="email"  class="form-control" value="{{$escritorio->email or old('email')}}" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @else
                                <input type="email"  class="form-control" value="default@example.com" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @endif
                         </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                     Enviar
                            </button>
                        </div>
                    </div>
                    {!!Form::close(['route' => 'escritorios.store','class' => 'form'])!!} 

                </div>
            </div>
        </div>
    </div>
</div>    

@endsection