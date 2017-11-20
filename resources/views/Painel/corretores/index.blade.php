@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Corretores</h1>
    
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
    
    </table>
{!! $corretores->links()!!}
@endsection