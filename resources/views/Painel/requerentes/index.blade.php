@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Requerentes</h1>
        <!-- INICIO   -->  
  <form action="/crud_advocacia/public/searchRequerente" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group  col-xs-4 pull-right">
        <input type="text" class="form-control" name="q"
            placeholder="Pesquisa requerentes" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
  </form>

    <a href="{{route('requerentes.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Nome</th>
          <th>Profissão</th>
          <th>RG</th>
          <th>CPF</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Cidade</th>
        
      
          <th width="100px">Ações</th>
        </tr>
     
        @if(isset($requerentes))
        @foreach($requerentes as $requerente)
       <tr>
            <td>{{$requerente->nome}}</td>
            <td>{{$requerente->profissao}}</td>
            <td>{{$requerente->rg}}</td>
            <td>{{$requerente->cpf}}</td>
            <td>{{$requerente->endereco}}</td>
            <td>{{$requerente->bairro}}</td>
            <td>{{$requerente->cidade}}</td>
        
            <td>
                 <a href="{{route('requerentes.edit',$requerente->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('requerentes.show',$requerente->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
       @elseif(isset($message))
	  <p style="color:red;font-size:160%;">{{ $message }}</p>
       @endif
    
    </table>
    
 @if(isset($requerentes))
   {!! $requerentes->links()!!}
@endif

@endsection