@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Escritórios</h1>
    
    <a href="{{route('escritorios.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Nome</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>UF</th>
          <th width="100px">Ações</th>
        </tr>
      
       @foreach($escritorios as $escritorio)
       <tr>
            <td>{{$escritorio->nome}}</td>
            <td>{{$escritorio->endereco}}</td>     
            <td>{{$escritorio->bairro}}</td>
            <td>{{$escritorio->cidade}}</td>
            <td>{{$escritorio->uf}}</td>
            <td>
                 <a href="{{route('escritorios.edit',$escritorio->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('escritorios.show',$escritorio->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
    
    </table>
{!! $escritorios->links()!!}
@endsection