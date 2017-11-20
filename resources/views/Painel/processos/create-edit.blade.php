@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('processos.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Processo: <b> {{$processo->numero or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($processo) ) 
    {!!Form::model($processo,['route' => ['processos.update',$processo->id],'class' => 'form','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'processos.store','class' => 'form'])!!} 
@endif

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <!-- Helder 10 /////////////////////////////////////////////////////////////// --> 
  
    <div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Processo</div>

                <div class="panel-body">

                        <div class="form-group">
                            <label for="numero" class="col-md-4 control-label">Número do processo</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required autofocus>

                            </div>
                        </div>
 <!-- Requerente inicio -->
 
                        <div class="form-group">
                            <label for="cod_requerente" class="col-md-4 control-label">Nome do Requerente</label>

                            <div class="col-md-6">
                            <select name='cod_requerente' class='form-control'>
                                  <option>Escolha o Requerente </option>
                                  @foreach($requerentes as $requerente)
                                    <option value='{{$requerente->id}}' 
                                            >{{$requerente->nome}}</option>
     
                                  @endforeach
                            </select> 
                              
                            </div>
                        </div>
  
<!-- Requerente fim -->
                        <div class="form-group">
                            <label for="cod_advogado" class="col-md-4 control-label">Nome do Advogado</label>

                            <div class="col-md-6">
                            <select name='cod_advogado' class='form-control'>
                                  <option>Escolha o Advogado </option>
                                  @foreach($advogados as $advogado)
                                    <option value='{{$advogado->id}}' 
                                            >{{$advogado->nome}}</option>
     
                                  @endforeach
                            </select> 
                              
                            </div>
                        </div>
        
                    
                        <div class="form-group">
                            <label for="comarca" class="col-md-4 control-label">Comarca</label>

                            <div class="col-md-6">
                                <input id="comarca" type="text" class="form-control" name="comarca" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vara" class="col-md-4 control-label">Vara</label>

                            <div class="col-md-6">
                                <input id="vara" type="text" class="form-control" name="vara" required>                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camara" class="col-md-4 control-label">Câmara</label>

                            <div class="col-md-6">
                                <input id="camara" type="text" class="form-control" name="camara" required>

                            </div>
                        </div>
         
   <!-- Acidente - inicio -->
    <div class="container" >
    <div class="row" >
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Acidente</div>

                <div class="panel-body">
                        <div class="form-group">
                            <label for="data_acid" class="col-md-4 control-label">Data e hora</label>

                            <div class="col-md-6">
                            <!--    {!!Form::input('text', 'data_acid', \Carbon\Carbon::create()->format('d/m/Y H:i:s'), ['class'=>'form-control'])!!} -->                   
                          {!! Form::datetime('data_acid', \Carbon\Carbon::now(), ['class'=>'form-control'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="local_acid" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local_acid" type="text" class="form-control" name="local_acid" required>

                            </div>
                        </div>

                         <div class="form-group">
                            <label for="tipo_veiculo_acid" class="col-md-4 control-label">Tipo de veículo</label>

                            <div class="col-md-6">
                                <input id="tipo_veiculo_acid" type="text" class="form-control" name="tipo_veiculo_acid" required>

                            </div>
                        </div>

                         <div class="form-group">
                            <label for="modelo_acid" class="col-md-4 control-label">Modelo do veículo</label>

                            <div class="col-md-6">
                                <input id="modelo_acid" type="text" class="form-control" name="modelo_acid" required>

                            </div>
                        </div>

                     <div class="form-group">
                            <label for="numero_boletim_acid" class="col-md-4 control-label">Número do boletim</label>

                            <div class="col-md-6">
                                <input id="numero_boletim_acid" type="text" class="form-control" name="numero_boletim_acid" required>

                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="dp_acid" class="col-md-4 control-label">DP</label>

                            <div class="col-md-6">
                                <input id="dp_acid" type="text" class="form-control" name="dp_acid" required>

                            </div>
                        </div>

                    
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Acidente Fim -->


<!-- Hospital Inicio -->

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dados hospitalar</div>

                <div class="panel-body">

                     <div class="form-group">
                            <label for="lesao_hosp" class="col-md-4 control-label">Lesão</label>

                            <div class="col-md-6">
                                <input id="lesao_hosp" type="text" class="form-control" name="lesao_hosp" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="data_hosp" class="col-md-4 control-label">Data e hora</label>

                            <div class="col-md-6">
                                {!! Form::datetime('data_hosp', \Carbon\Carbon::now(), ['class'=>'form-control'])!!}
      
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="local_hosp" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local_hosp" type="text" class="form-control" name="local_hosp" required>

                            </div>
                        </div>

                        
                         <div class="form-group">
                            <label for="sala_hosp" class="col-md-4 control-label">Sala</label>

                            <div class="col-md-6">
                                <input id="sala_hosp" type="text" class="form-control" name="sala_hosp" required>

                            </div>
                        </div>
 
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- Hospital  Fim -->
                    
<!-- Audiência  Inicio -->

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Audiência</div>

                <div class="panel-body">

                     <div class="form-group">
                            <label for="data_aud" class="col-md-4 control-label">Data e hora</label>

                            <div class="col-md-6">
                                {!! Form::datetime('data_aud', \Carbon\Carbon::now(), ['class'=>'form-control'])!!}
      
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="local_aud" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local_aud" type="text" class="form-control" name="local_aud" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sala_aud" class="col-md-4 control-label">Sala</label>

                            <div class="col-md-6">
                                <input id="sala_aud" type="text" class="form-control" name="sala_aud" required>

                            </div>
                        </div>

                        
                         <div class="form-group">
                            <label for="valor_condenação_aud" class="col-md-4 control-label">Valor da condenação</label>

                            <div class="col-md-6">
                                <!-- INICIO 
                              
                            div class="form-group{{ $errors->has('fuel') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Consumption</label>
                            <div class="col-md-6">
                                {!! Form::number('fuel',null,['class' => 'form-control']) !!}

                                @if ($errors->has('fuel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                              FIM  -->
                              
                                  <!--  <input id="valor_condenação_aud" type="text" class="form-control" name="valor_condenação_aud" required> -->

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
7


<!-- Audiência  Fim -->



   
       
 <!--  {!!Form::submit('Enviar',['class' => 'btn btn-primary'])!!} -->

  {!!Form::close(['route' => 'processos.store','class' => 'form'])!!} 

@endsection