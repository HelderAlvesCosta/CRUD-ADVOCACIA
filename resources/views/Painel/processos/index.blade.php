@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Processos</h1>
        <!-- INICIO   -->  
  <form action="/crud_advocacia/public/searchProcesso" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group  col-xs-4 pull-right">
        <input type="text" class="form-control" name="q"
            placeholder="Pesquisa processos" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
  </form>

    <a href="{{route('processos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Número</th>
         
      
          <th width="120px">Ações</th>
        </tr>
      
        @if(isset($processos))
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
       @elseif(isset($message))
	   <p style="color:red;font-size:160%;">{{ $message }}</p>
       @endif
    
    </table>
    
@if(isset($processos))
   {!! $processos->links()!!}
@endif

@endsection