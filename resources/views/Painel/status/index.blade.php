@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">Listagem dos Status</h1>
 
    <!-- INICIO   -->  
     <div class="form-group input-group">
   
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
     </div>
  <!-- FIM   -->  
  
    <a href="{{route('status.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table id="tabela" class="table table-hover table-striped table-condensed"> 
        <thead>
        <tr>
          <th>Descrição</th>
          <th width="72px">Ações</th>
        </tr>
        </thead>
       
       <tbody>
       @if(isset($status))
       @foreach($status as $statu)
       <tr>
            <td>{{$statu->descricao}}</td>
            <td>
                 <a href="{{route('status.edit',$statu->id)}}" title="Editar status"  class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('status.show',$statu->id)}}" title="Visualisar status"  class="actions delete">
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
 
    
@if(isset($status))
   {!! $status->links()!!}
@endif

@endsection