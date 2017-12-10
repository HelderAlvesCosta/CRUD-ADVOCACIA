@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">{{$title}}</h1>
    
    <a href="{{route('andamentos.create',$processo_id)}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-hover table-striped table-condensed"> 
  
        <tr>
          <th width="100px">Data</th>
          <th>Status</th>
          <th width="72px">Ações</th>
        </tr>
      
        @foreach($andamentos as $andamento)
        <tr>
          
            <!-- <td>{{$andamento->data}}</td> -->
            <td>{{ date( 'd/m/Y' , strtotime($andamento->data))}}</td>
            @foreach($status as $statu)
                @if ( $andamento->status_id == $statu->id )
                   <td>{{$statu->descricao}}</td> 
                @endif
            @endforeach
     
            <td>
                 <a href="{{route('andamentos.edit',[$andamento->processo_id,$andamento->data])}}" title="Editar andamento" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('andamentos.show',$andamento->processo_id)}}" title="Visualisar andamento"  class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
    
    </table>



@endsection