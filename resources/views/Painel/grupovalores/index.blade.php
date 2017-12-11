@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">Listagem dos Grupo de valores</h1>
    
    <a href="{{route('grupovalores.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table id="tabela" class="table table-hover table-striped table-condensed"> 
        <thead>
        <tr>
          <th>Grupo</th>
          <th>Valor</th>
          <th width="72px">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($grupovalores as $grupovalore)
       <tr>
            <td>{{$grupovalore->id}}</td>
         <!--    <td>{{$grupovalore->valor}}</td> -->
            <td>R$ {{number_format($grupovalore->valor,2,",",".")}}</td> 
            
            <td>
                 <a href="{{route('grupovalores.edit',$grupovalore->id)}}" title="Editar grupo de valor" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('grupovalores.show',$grupovalore->id)}}" title="Visualisar grupo de valor"  class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
       </tbody
    </table>
    
    <script>
            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>
 
{!! $grupovalores->links()!!}

@endsection