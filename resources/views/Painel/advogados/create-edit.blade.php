@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('advogados.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Advogado: <b> {{$advogado->nome or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($advogado) ) 
    {!!Form::model($advogado,['route' => ['advogados.update',$advogado->id],'class' => 'form','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'advogados.store','class' => 'form'])!!} 
@endif

<input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dados do Advogado</div>

                <div class="panel-body">

                       <div class="form-group">
                            <label for="nome" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="oab" class="col-md-4 control-label">OAB</label>

                            <div class="col-md-6">
                            <!--   <input id="oab" type="text" class="data" name="oab" required> -->
                            <input id="oab" type="text" class="form-control data" name="oab" required> 
                                
<!-- <input type="text" name="oab" data-mask="00/00/0000" /> --> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="uf" class="col-md-4 control-label">UF</label>

                            <div class="col-md-6">
                                <input id="uf" type="text" class="form-control" name="uf" required>

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


{!!Form::close(['route' => 'advogados.store','class' => 'form'])!!} 

@endsection