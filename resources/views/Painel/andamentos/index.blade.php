@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">{{$title}}</h1>
    
    <a href="{{route('andamentos.create',$processo_id)}}" class="btn btn-success btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-hover table-striped table-condensed"> 
  
        <tr bgcolor="#CCC" style="color:#fff;">
          <th width="100px"><b>DATA</b></th>
          <th ><b>STATUS</b></th>
          <th width="100"><b>AÇÕES</b></th>
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
                 <a href="{{route('andamentos.edit',[$andamento->processo_id,$andamento->data])}}" title="Editar andamento" class="btn btn-primary btn-add">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('andamentos.show',$andamento->processo_id)}}" title="Visualisar andamento"  class="btn btn-primary btn-add">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
    
    </table>



@endsection