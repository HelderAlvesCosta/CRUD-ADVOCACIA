@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Dados corporais</h1>
        <!-- INICIO   -->  
  <form action="/crud_advocacia/public/searchDadoscorporai" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group  col-xs-4 pull-right">
        <input type="text" class="form-control" name="q"
            placeholder="Pesquisa dados corporais" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
  </form>

    <a href="{{route('dadoscorporais.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Número</th>
         
      
          <th width="120px">Ações</th>
        </tr>
      
        @if(isset($dadoscorporais))
        @foreach($dadoscorporais as $dadoscorporai)
       <tr>
            <td>{{$dadoscorporai->numero}}</td>
          
            <td>
                <a href="{{route('dadoscorporais.edit',$dadoscorporai->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('dadoscorporais.show',$dadoscorporai->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
       @elseif(isset($message))
	   <p style="color:red;font-size:160%;">{{ $message }}</p>
       @endif
    
    </table>
    
@if(isset($dadoscorporais))
   {!! $dadoscorporais->links()!!}
@endif

@endsection