@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Status</h1>
        <!-- INICIO   -->  
  <form action="/crud_advocacia/public/searchStatu" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group  col-xs-4 pull-right">
        <input type="text" class="form-control" name="q"
            placeholder="Pesquisa status" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
  </form>

    <a href="{{route('status.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Descrição</th>
          <th width="100px">Ações</th>
        </tr>
       
       @if(isset($advogados))
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
       @elseif(isset($message))
	   <p style="color:red;font-size:160%;">{{ $message }}</p>
       @endif
    
    </table>
    
@if(isset($status))
   {!! $status->links()!!}
@endif

@endsection