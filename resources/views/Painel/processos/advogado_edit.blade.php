 <h1 class="title-pg">
              <a href="{{route('advogados.index')}}"> </a>
              Gestão Advogado: <font style="color:red;" size="3">  {{$advogado->nome or '<Novo>'}}</font>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif


<input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dados do Advogado</div>

                <div class="panel-body">
                     <form  class="form-horizontal" role="form">
     
                       <div class="form-group">
                            <label for="nome_advogado" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Nome</label>

                            <div class="col-md-6">
                                <input id="nome_advogado" type="text" class="form-control" name="nome_advogado" value="{{$advogado->nome or old('nome_advogado')}}" required>

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
                                <select id="uf_advogado" type="text" class="chosen-select-width" name="uf_advogado" value="{{$advogado->uf or old('uf_advogado')}}"></select>
                                
                            </div>
                        </div>
                             
                            <script language="JavaScript" type="text/javascript" charset="utf-8">
                                new dgCidadesEstados({
                                estado: document.getElementById('uf_advogado')
                              })
                            </script>
                        
                        
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone_advogado" type="text" class="form-control tel" name="telefone_advogado" value="{{$advogado->telefone or old('telefone_advogado')}}">

                            </div>
                        </div>
                        <!-- inicio -->
                          <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                            @if( isset($requerente) ) 
                                <input type="email"  class="form-control" value="{{$advogado->email or old('email_advogado')}}" id="email_advogado" name="email_advogado" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @else
                                <input type="email"  class="form-control" value="default@example.com" id="email_advogado" name="email_advogado" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            @endif
                           
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="banco" class="col-md-4 control-label">Banco</label>

                            <div class="col-md-6">
                                <select id="banco_advogado" name="banco_advogado" data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
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
                                <input id="agencia_advogado" name="agencia_advogado"  type="text" class="form-control" name="agencia" value="{{$advogado->agencia or old('agencia_advogado')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="conta" class="col-md-4 control-label">Conta</label>

                            <div class="col-md-6">
                                <input id="conta_advogado"  name="conta_advogado"  type="text" class="form-control" name="conta" value="{{$advogado->conta or old('conta_advogado')}}">

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <input id="tipo_advogado" type="text" class="form-control" name="tipo_advogado" value="{{$advogado->tipo or old('tipo_advogado')}}">

                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="button" class="btn btn-primary add_advogado">
                                    Enviar
                                </button>
                            </div>
                        </div>
                 <!--      {!!Form::close(['route' => 'advogados.store','class' => 'form'])!!} 
                 -->
                 </form>
                </div>
            </div>
            
            
        </div>
    </div>
</div>


