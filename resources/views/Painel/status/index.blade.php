@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Status</h1>
    
    <a href="{{route('status.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Descrição</th>
          <th width="100px">Ações</th>
        </tr>
      
       @foreach($status as $statu)
       <tr>
            <td>{{$statu->descricao}}</td>
            <td>
                 <a href="{{route('status.edit',$statu->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('status.show',$statu->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
    
    </table>
{!! $status->links()!!}
@endsection