@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem das Lesões</h1>
        <!-- INICIO   -->  
  <form action="/crud_advocacia/public/searchLesoe" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group  col-xs-4 pull-right">
        <input type="text" class="form-control" name="q"
            placeholder="Pesquisa lesoes" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
  </form>

    <a href="{{route('lesoes.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
<!--   <table class="table table-striped">-->  

   <!-- <table class="table table-condensed table-striped"> -->
    <table class="table table-hover table-striped table-condensed"> 
        <tr>
          <th>Número</th>
          <th>Descrição</th>
          <th width=72">Ações</th> 
        </tr>
      
        @if(isset($lesoes))
        @foreach($lesoes as $lesoe)
       <tr>
            <td>{{$lesoe->id}}</td> 
            <td>
               <textarea name="" id="" cols="150" rows="2">{{$lesoe->descricao}}</textarea>
            </td>
            <td>
                <a href="{{route('lesoes.edit',$lesoe->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('lesoes.show',$lesoe->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
       @elseif(isset($message))
	   <p style="color:red;font-size:160%;">{{ $message }}</p>
       @endif
    </table>

@if(isset($lesoes))
   {!! $lesoes->links()!!}
@endif

@endsection