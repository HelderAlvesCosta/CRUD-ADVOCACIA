@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">Listagem dos Corretores</h1>
 <!-- INICIO   -->  
  <div class="form-group input-group">
   
     <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
     <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
  </div>
  <!-- FIM   -->  
  
  <a href="{{route('corretores.create')}} "class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
    
    <table id="tabela" class="table table-hover table-striped table-condensed">         
        <thead>
        <tr>
          <th>Nome</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>UF</th>
          <th width="72px">Ações</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($corretores))
        @foreach($corretores as $corretore)
       <tr>
            <td>{{$corretore->nome}}</td>
            <td>{{$corretore->endereco}}</td>     
            <td>{{$corretore->bairro}}</td>
            <td>{{$corretore->cidade}}</td>
            <td>{{$corretore->uf}}</td>
            <td>
                 <a href="{{route('corretores.edit',$corretore->id)}}"  title="Editar corretor"  class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('corretores.show',$corretore->id)}}" title="Visualisar corretor"  class="actions delete">
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
 
@if(isset($corretores))
   {!! $corretores->links()!!}
@endif

@endsection