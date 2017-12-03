@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Grupo de valores</h1>
    
    <a href="{{route('grupovalores.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Grupo</th>
          <th>Valor</th>
          <th width="100px">Ações</th>
        </tr>
    
        @foreach($grupovalores as $grupovalore)
       <tr>
            <td>{{$grupovalore->id}}</td>
            <td>{{$grupovalore->valor}}</td>
            
            <td>
                 <a href="{{route('grupovalores.edit',$grupovalore->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('grupovalores.show',$grupovalore->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
      
    </table>
{!! $grupovalores->links()!!}

@endsection