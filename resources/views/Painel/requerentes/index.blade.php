@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Requerentes</h1>
   <!-- INICIO   -->  
  <div class="form-group input-group">
   
     <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
     <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
  </div>
  <!-- FIM   -->  
  
    <a href="{{route('requerentes.create')}}"  class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table id="tabela" class="table table-hover table-striped table-condensed">     
        
        <thead>
        <tr>
          <th>Nome</th>
          <th>RG</th>
          <th>CPF</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Cidade</th>
        
      
          <th width="72px">Ações</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($requerentes))
        @foreach($requerentes as $requerente)
       <tr>
            <td>{{$requerente->nome}}</td>
            <td>{{$requerente->rg}}</td>
            <td>{{$requerente->cpf}}</td>
            <td>{{$requerente->endereco}}</td>
            <td>{{$requerente->bairro}}</td>
            <td>{{$requerente->cidade}}</td>
        
            <td>
                 <a href="{{route('requerentes.edit',$requerente->id)}}" title="Editar requerente" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('requerentes.show',$requerente->id)}}" title="Visualisar requerente"  class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
       @elseif(isset($message))
	  <p style="color:red;font-size:160%;">{{ $message }}</p>
       @endif
    </tbody>
    </table>
    
    <script>
            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>
 
    
 @if(isset($requerentes))
   {!! $requerentes->links()!!}
@endif

@endsection