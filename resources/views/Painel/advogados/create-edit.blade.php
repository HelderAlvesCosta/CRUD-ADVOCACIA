@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg" align="center">
    <a href="{{route('advogados.index')}}" ><span class='glyphicon glyphicon-fast-backward'> </a>
    Gestão Advogado: <font style="color:red;" size="3"> <b>{{$advogado->nome or '<Novo>'}}</b> </font>
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><font style="color:red;" size="3"> <b>Dados do Advogado</b> </font></div>

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
                        <!-- inicio -->
                          <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                            @if( isset($requerente) ) 
                                <input type="email"  class="form-control" value="{{$advogado->email or old('email')}}" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @else
                                <input type="email"  class="form-control" value="default@example.com" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @endif
                           
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="banco" class="col-md-4 control-label">Banco</label>

                            <div class="col-md-6">
                                <select id="banco" name="banco" data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                <option>Selecione um banco</option>
                                @foreach($bancos as $banco)
                                    <option value='{{$banco}}' 
                                            @if(isset($advogado) && $advogado->banco == $banco)
                                                selected
                                            @endif
                                            >{{$banco}}</option>
                                @endforeach
                                </select> 
                         
                            </div>
                        </div>
                      
                        <!-- fim -->
                        <div class="form-group">
                            <label for="agencia" class="col-md-4 control-label">Agência</label>

                            <div class="col-md-6">
                                <input id="agencia" name="agencia"  type="text" class="form-control" name="agencia" value="{{$advogado->agencia or old('agencia')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="conta" class="col-md-4 control-label">Conta</label>

                            <div class="col-md-6">
                                <input id="conta"  name="conta"  type="text" class="form-control" name="conta" value="{{$advogado->conta or old('conta')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{$advogado->tipo or old('tipo')}}">

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