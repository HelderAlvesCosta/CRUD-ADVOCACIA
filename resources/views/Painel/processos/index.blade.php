@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Processos</h1>
    
    <a href="{{route('processos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Número</th>
         
      
          <th width="120px">Ações</th>
        </tr>
      
        @foreach($processos as $processo)
       <tr>
            <td>{{$processo->numero}}</td>
          
            <td>
                <a href="{{route('processos.edit',$processo->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('processos.show',$processo->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
                <a href="{{route('andamentos.index',$processo->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-folder-close"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
    
    </table>
{!! $processos->links()!!}
@endsection