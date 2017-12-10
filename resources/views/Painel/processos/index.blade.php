@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Processos</h1>
  <!-- INICIO   -->  
     <div class="form-group input-group">
   
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
     </div>
  <!-- FIM   -->  
  
    <a href="{{route('processos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
   <table id="tabela" class="table table-hover table-striped table-condensed">      
        <thead>
        <tr>
          <th>Número</th>
         
      
          <th width="107px">Ações</th>
        </tr>
        </thead>
      
        <tbody>
        @if(isset($processos))
        @foreach($processos as $processo)
       <tr>
            <td>{{$processo->numero}}</td>
          
            <td>
                <a href="{{route('processos.edit',$processo->id)}}" title="Editar processo" class="actions edit">
                    <span class="glyphicon glyphicon-pencil" ></span>
                </a> 
                <a href="{{route('processos.show',$processo->id)}}" title="Visualisar processo" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
                <a href="{{route('andamentos.index',$processo->id)}}" title="Acompanhamento do processo" class="actions edit">
                    <span class="glyphicon glyphicon-folder-close"></span>
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
 
    
@if(isset($processos))
   {!! $processos->links()!!}
@endif

@endsection