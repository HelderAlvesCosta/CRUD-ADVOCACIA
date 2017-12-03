@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Corretores</h1>
  <!-- INICIO   -->  
  <form action="/crud_advocacia/public/searchCorretore" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group  col-xs-4 pull-right">
        <input type="text" class="form-control" name="q"
            placeholder="Pesquisa corretores" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
  </form>
  
  <!-- FIM   -->  

    
    <a href="{{route('corretores.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Nome</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>UF</th>
          <th width="100px">Ações</th>
        </tr>
    
        @if(isset($corretores))
        @foreach($corretores as $corretore)
       <tr>
            <td>{{$corretore->nome}}</td>
            <td>{{$corretore->endereco}}</td>     
            <td>{{$corretore->bairro}}</td>
            <td>{{$corretore->cidade}}</td>
            <td>{{$corretore->uf}}</td>
            <td>
                 <a href="{{route('corretores.edit',$corretore->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('corretores.show',$corretore->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
       @elseif(isset($message))
	   <p style="color:red;font-size:160%;">{{ $message }}</p>
	@endif
    
    </table>
@if(isset($corretores))
   {!! $corretores->links()!!}
@endif

@endsection