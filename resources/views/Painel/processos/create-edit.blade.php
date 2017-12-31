@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<input type="hidden" name="_token" value="{{csrf_token()}}">    
    
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">HOME</a></li>
    <li><a href="#menu1">Requerentes</a></li>
    <li><a href="#menu2">Advogados</a></li>
    <li><a href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h1 class="title-pg">
    <a href="{{route('processos.index')}}"></a>
    Gestão Processo: <b style="color:red;">  {{$processo->numero or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($processo) ) 
    {!!Form::model($processo,['route' => ['processos.update',$processo->id],'id' => 'myform','name' => 'myform', 'class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'processos.store','id' => 'myform','name' => 'myform','class' => 'form-horizontal'])!!} 
@endif

    <input type="hidden" name="_token" value="{{csrf_token()}}">
  
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading" style="color:red; font-weight:bold; font-size:150%" >Processo</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="numero" class="col-md-4 control-label">Número do processo</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" value="{{$processo->numero or old('nome')}}" required autofocus>

                            </div>
                        </div>
                    
 
                        <div class="form-group">
                            <label for="cod_requerente" class="col-md-4 control-label">Nome do Requerente</label>

                            <div class="col-md-6">
                          <!--  <select name='cod_requerente' class='form-control'> -->
                                 <select data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                    <option>Selecione o requerente</option>    
                                    @foreach($requerentes as $requerentes)
                                        <option value='{{$requerentes->id}}' 
                                            @if(isset($processo) && $processo->cod_requerentes == $requerentes->id)
                                                selected
                                            @endif
                                            >{{$requerentes->nome}}</option>
     
                                      @endforeach
                            </select> 
                              
                            </div>
                        </div>
  
<!-- Requerente fim -->
                        <div class="form-group">
                            <label for="cod_advogado" class="col-md-4 control-label">Nome do Advogado</label>

                            <div class="col-md-6">
                           
                                <select data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                  <option>Selecione o advogado</option>
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
                </div>
       

<!-- Acidente - inicio -->
                        <div class="container" >
                            <div class="row" >
                                <div class="col-md-7 col-md-offset-0">
                                     <div class="panel panel-default">
                                        <div class="panel-heading" style="color:red; font-weight:bold;; font-size:150%">Acidente</div>

                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="data_acid" class="col-md-4 control-label">Data</label>
                                                      <div class="col-md-6">
                                                         @if( isset($processo) ) 
                                                            {!! Form::date('data_acid', \Carbon\Carbon::parse($processo->data_acid)->format('Y-m-d'), ['class'=>'form-control'])!!} 
                                                         @else
                                                            {!! Form::date('data_acid', \Carbon\Carbon::now(), ['class'=>'form-control'])!!} 
                                                         @endif   
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
        <div class="col-md-7 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading" style="color:red; font-weight:bold;; font-size:150%">Dados hospitalar</div>

                <div class="panel-body">

                    <!-- INICIO SELECTED -->
                        <div class="form-group">
                            <label for="numero" class="col-md-4 control-label">Selecionar Lesôes</label>

                              <div class="col-md-6">
                                <select id="opcao" name="opcoes[]" class="chosen-select-width col-md-2" multiple > 

                                   @foreach($lesoes as $lesoe)
                                       <option value='{{$lesoe->id}}'
                                        @if(isset($processolesoes))

                                           @foreach($processolesoes as $processolesoe)
                                              @if( $lesoe->id == $processolesoe->lesoe_id)
                                                 selected
                                              @endif
                                           @endforeach

                                       @endif
                                       >{{$lesoe->descricao}}</option>

                                   @endforeach

                               </select> 
                              </div>
                        </div>    
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
        <div class="col-md-7 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading " style="color:red; font-weight:bold; font-size:150%">Audiência</div>

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
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                          Enviar
                    </button>
               </div>
            </div>
          {!!Form::close(['route' => 'processos.store','class' => 'form'])!!} 
      
        </div>
      
    </div>
 </div>


            </div>
        </div>
    </div>
</div>
      
    </div>

    <!-- NOVO Requerente INICIO -->
    <div id="menu1" class="tab-pane fade">
   
         <h1 class="title-pg">
              <a href="{{route('requerentes.index')}}"> </a>
              Gestão Requerente: <b style="color:red;"> {{$requerente->nome or 'Novo'}}</b>
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
                                      <select id="sexo" name="sexo" data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                           <option>Selecione o sexo</option>
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
                                          <option>Selecione a nacionalidade</option>
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
                                      <option>Selecione o estado civil</option>
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
                                          <select id="banco" name="banco" data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
                                          <option>Selecione um banco</option> 
                                          @foreach($bancos as $banco)
                                              <option value='{{$banco}}' 
                                                      @if(isset($requerente) && $requerente->banco == $banco)
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
                                          <input id="agencia" name="agencia"  type="text" class="form-control" name="agencia" value="{{$requerente->agencia or old('agencia')}}">

                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="conta" class="col-md-4 control-label">Conta</label>

                                      <div class="col-md-6">
                                          <input id="conta"  name="conta"  type="text" class="form-control" name="conta" value="{{$requerente->conta or old('conta')}}">

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
  
        
    </div>
    
    <!-- NOVO Advogado INICIO -->
   
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

@endsection



 