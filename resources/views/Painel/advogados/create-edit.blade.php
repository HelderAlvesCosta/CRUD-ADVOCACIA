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
    {!!Form::model($advogado,['route' => ['advogados.update',$advogado->id],'class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'advogados.store','class' => 'form-horizontal'])!!} 
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
                                <input id="nome" type="text" class="form-control" name="nome" value="{{$advogado->nome or old('nome')}}" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="oab" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>OAB</label>

                            <div class="col-md-6">
                            <!--   <input id="oab" type="text" class="data" name="oab" required> -->
                            <input id="oab" type="text" class="form-control" name="oab" value="{{$advogado->oab or old('oab')}}" > 
                                
<!-- <input type="text" name="oab" data-mask="00/00/0000" /> --> 
                            </div>
                        </div>
                        <!-- INICIO -->
                        <!-- FIM    -->
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
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control tel" name="telefone" value="{{$advogado->telefone or old('telefone')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                            @if( isset($advogado) ) 
                                <input type="email"  class="form-control" value="{{$advogado->email or old('email')}}" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
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
                       {!!Form::close(['route' => 'advogados.store','class' => 'form'])!!} 
            
                </div>
            </div>
            
            
        </div>
    </div>
</div>



@endsection