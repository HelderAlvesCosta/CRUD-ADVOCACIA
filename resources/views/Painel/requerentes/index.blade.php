@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Requerentes</h1>
    
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
          <th>UF</th>
          <th>CEP</th>
          <th>Telefone</th>
          <th>E-Mail</th>
         
      
          <th width="100px">Ações</th>
        </tr>
      
        @foreach($requerentes as $requerente)
       <tr>
            <td>{{$requerente->nome}}</td>
            <td>{{$requerente->profissao}}</td>
            <td>{{$requerente->rg}}</td>
            <td>{{$requerente->cpf}}</td>
            <td>{{$requerente->endereco}}</td>
            <td>{{$requerente->bairro}}</td>
            <td>{{$requerente->cidade}}</td>
            <td>{{$requerente->uf}}</td>
            <td>{{$requerente->cep}}</td>
            <td>{{$requerente->telefone}}</td>
            <td>{{$requerente->email}}</td>
        
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
    
    </table>
{!! $requerentes->links()!!}
@endsection