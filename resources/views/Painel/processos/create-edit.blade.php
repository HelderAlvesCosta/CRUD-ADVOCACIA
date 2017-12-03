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
                                <input id="numero" type="text" class="form-control" name="numero" value="{{$processo->numero or old('nome')}}" required autofocus>

                            </div>
                        </div>
                    
 
 <!-- Requerente inicio -->
 
                        <div class="form-group">
                            <label for="cod_requerente" class="col-md-4 control-label">Nome do Requerente</label>

                            <div class="col-md-6">
                          <!--  <select name='cod_requerente' class='form-control'> -->
             <select data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
      
                                  @foreach($requerentes as $requerente)
                                    <option value='{{$requerente->id}}' 
                                            @if(isset($processo) && $processo->cod_requerente == $requerente->id)
                                                selected
                                            @endif
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
                                            @if(isset($processo) && $processo->cod_advogado == $advogado->id)
                                                selected
                                            @endif
                                            >{{$advogado->nome}}</option>
     
                                  @endforeach
                            </select> 
                              
                            </div>
                        </div>
        
                    
                        <div class="form-group">
                            <label for="comarca" class="col-md-4 control-label">Comarca</label>

                            <div class="col-md-6">
                                <input id="comarca" type="text" class="form-control" name="comarca" value="{{$processo->comarca or old('comarca')}}" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vara" class="col-md-4 control-label">Vara</label>

                            <div class="col-md-6">
                                <input id="vara" type="text" class="form-control" name="vara" value="{{$processo->vara or old('vara')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camara" class="col-md-4 control-label">Câmara</label>

                            <div class="col-md-6">
                                <input id="camara" type="text" class="form-control" name="camara" value="{{$processo->camara or old('camara')}}" required>

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
                            <label for="data_acid" class="col-md-4 control-label">Data</label>

                            <div class="col-md-6">
@if( isset($processo) ) 
   {!! Form::date('data_acid', \Carbon\Carbon::parse($processo->data_acid)->format('Y-m-d'), ['class'=>'form-control'])!!} 
@else
   {!! Form::date('data_acid', \Carbon\Carbon::now(), ['class'=>'form-control'])!!} 
@endif   
                            <!--     {!! Form::datetime('data_acid', \Carbon\Carbon::now(), ['class'=>'form-control'])!!} -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hora_acid" class="col-md-4 control-label">Hora</label>

                            <div class="col-md-6">
                                <input id="hora_acid" type="text" class="form-control tempo" name="hora_acid" value="{{$processo->hora_acid or old('hora_acid')}}" required autofocus>

                            </div>
                        </div>

                    
                    
                        <div class="form-group">
                            <label for="local_acid" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local_acid" type="text" class="form-control" name="local_acid" value="{{$processo->local_acid or old('local_acid')}}" required>

                            </div>
                        </div>

                         <div class="form-group">
                            <label for="tipo_veiculo_acid" class="col-md-4 control-label">Tipo de veículo</label>

                            <div class="col-md-6">
                                <input id="tipo_veiculo_acid" type="text" class="form-control" name="tipo_veiculo_acid" value="{{$processo->tipo_veiculo_acid or old('tipo_veiculo_acid')}}" required>

                            </div>
                        </div>

                         <div class="form-group">
                            <label for="modelo_acid" class="col-md-4 control-label">Modelo do veículo</label>

                            <div class="col-md-6">
                                <input id="modelo_acid" type="text" class="form-control" name="modelo_acid" value="{{$processo->modelo_acid or old('modelo_acid')}}" required>

                            </div>
                        </div>

                     <div class="form-group">
                            <label for="numero_boletim_acid" class="col-md-4 control-label">Número do boletim</label>

                            <div class="col-md-6">
                                <input id="numero_boletim_acid" type="text" class="form-control" name="numero_boletim_acid" value="{{$processo->numero_boletim_acid or old('numero_boletim_acid')}}" required>

                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="dp_acid" class="col-md-4 control-label">DP</label>

                            <div class="col-md-6">
                                <input id="dp_acid" type="text" class="form-control" name="dp_acid" value="{{$processo->dp_acid or old('dp_acid')}}" required>

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

                    <!-- INICIO SELECTED -->
    
  
                        <div class="form-group">
                            <label for="numero" class="col-md-5 control-label">Selecionar Lesão</label>

                            <div class="col-md-7">
                            <label for="numero" class="col-md-7 control-label text-right">Selecionado</label>

                            </div>
                        </div>
  <div class="form-group">
    <select id='opcoes' multiple='multiple'>
    <option value='elem_1' selected>xxxxxxxxx1xxxxxxxxx2xxxxxxxxx3xxxxxxxxx4xxxxxxxxx5xxxxxx</option>
    <option value='elem_2'>elem 2</option>
    <option value='elem_3'>elem 3</option>
    <option value='elem_4' selected>elem 4</option>
    ...
    <option value='elem_100'>elem 100</option>
  </select>
      
 <!--     <select id="opcoes" name="opcoes[]" class="col-md-4 control-label" multiple="multiple" >
    
        @foreach($corporais as $corporai)
            <option value='{{$corporai->id}}'
             @if(isset($processolesoes))
                
                @foreach($processolesoes as $processolesoe)
                   @if( $corporai->id == $processolesoe->corporai_id)
                      selected
                   @endif
                @endforeach
 
            @endif
            >{{$corporai->descricao}}</option>
     
        @endforeach
 
    </select> -->
      
   
  </div>
  <!-- FIM SELECTED   -->
 
 
                        <div class="form-group">
                            <label for="data_hosp" class="col-md-4 control-label">Data</label>

                            <div class="col-md-6">
@if( isset($processo) ) 
   {!! Form::date('data_hosp', \Carbon\Carbon::parse($processo->data_hosp)->format('Y-m-d'), ['class'=>'form-control'])!!} 
@else
   {!! Form::date('data_hosp', \Carbon\Carbon::parse(old('data_hosp'))->format('Y-m-d'), ['class'=>'form-control'])!!} 
@endif   
                     
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hora_hosp" class="col-md-4 control-label">Hora</label>

                            <div class="col-md-6">
                                <input id="hora_hosp" type="text" class="form-control tempo" name="hora_hosp" value="{{$processo->hora_hosp or old('hora_hosp')}}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="local_hosp" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local_hosp" type="text" class="form-control" name="local_hosp" value="{{$processo->local_hosp or old('local_hosp')}}" required>

                            </div>
                        </div>

                        
                         <div class="form-group">
                            <label for="sala_hosp" class="col-md-4 control-label">Sala</label>

                            <div class="col-md-6">
                                <input id="sala_hosp" type="text" class="form-control" name="sala_hosp" value="{{$processo->sala_hosp or old('sala_hosp')}}" required>

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
                            <label for="data_aud" class="col-md-4 control-label">Data</label>

                            <div class="col-md-6">
@if( isset($processo) ) 
   {!! Form::date('data_aud', \Carbon\Carbon::parse($processo->data_aud)->format('Y-m-d'), ['class'=>'form-control'])!!} 
@else
   {!! Form::date('data_aud', \Carbon\Carbon::parse(old('data_aud'))->format('Y-m-d'), ['class'=>'form-control'])!!} 
@endif   

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hora_aud" class="col-md-4 control-label">Hora</label>

                            <div class="col-md-6">
                                <input id="hora_aud" type="text" class="form-control tempo" name="hora_aud" value="{{$processo->hora_aud or old('hora_aud')}}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="local_aud" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local_aud" type="text" class="form-control" name="local_aud" value="{{$processo->local_aud or old('local_aud')}}" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sala_aud" class="col-md-4 control-label">Sala</label>

                            <div class="col-md-6">
                                <input id="sala_aud" type="text" class="form-control" name="sala_aud" value="{{$processo->sala_aud or old('sala_aud')}}" required>

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
                              
                                  <input id="valor_condenação_aud" type="text" class="form-control" name="valor_condenação_aud" value="{{$processo->valor_condenação_aud or old('valor_condenação_aud')}}" required> 
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


<!-- Audiência  Fim -->



   
       
 <!--  {!!Form::submit('Enviar',['class' => 'btn btn-primary'])!!} -->

  {!!Form::close(['route' => 'processos.store','class' => 'form'])!!} 

@endsection