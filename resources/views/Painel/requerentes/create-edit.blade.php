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
    {!!Form::model($requerente,['route' => ['requerentes.update',$requerente->id],'class' => 'form','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'requerentes.store','class' => 'form'])!!} 
@endif

 <input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dados do Requerente</div>

                <div class="panel-body">

                       <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" required>

                            </div>
                        </div>
                         <div class="form-group">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-6">
                                <input id="sexo" type="text" class="form-control" name="sexo" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nacionalidade" class="col-md-4 control-label">Nacionalidade</label>

                            <div class="col-md-6">
                                <input id="nacionalidade" type="text" class="form-control" name="nacionalidade" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estado_civil" class="col-md-4 control-label">Estado civil</label>

                            <div class="col-md-6">
                                <input id="estado_civil" type="text" class="form-control" name="estado_civil" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profissao" class="col-md-4 control-label">Profissão</label>

                            <div class="col-md-6">
                                <input id="profissao" type="text" class="form-control" name="profissao" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">RG</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" name="rg" required>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" required>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="endereco" class="col-md-4 control-label">Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="bairro" class="col-md-4 control-label">Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="cidade" class="col-md-4 control-label">Cidade</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control" name="cidade" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="uf" class="col-md-4 control-label">UF</label>

                            <div class="col-md-6">
                                <input id="uf" type="text" class="form-control" name="uf" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="cep" class="col-md-4 control-label">CEP</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" name="cep" required>

                            </div>
                        </div>
                       
                    
                    
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="banco" class="col-md-4 control-label">Banco</label>

                            <div class="col-md-6">
                                <input id="banco" type="text" class="form-control" name="banco" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="agencia" class="col-md-4 control-label">Agência</label>

                            <div class="col-md-6">
                                <input id="agencia" type="text" class="form-control" name="agencia" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="conta" class="col-md-4 control-label">Conta</label>

                            <div class="col-md-6">
                                <input id="conta" type="text" class="form-control" name="conta" required>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" required>

                            </div>
                        </div>
                       
                       
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-0">
                     <button type="submit" class="btn btn-primary">
                                Enviar
                     </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

{!!Form::close(['route' => 'requerentes.store','class' => 'form'])!!} 

@endsection