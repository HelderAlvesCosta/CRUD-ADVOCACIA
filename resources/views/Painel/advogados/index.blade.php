@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Advogados</h1>
  
  <!-- INICIO   -->  
  <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group  col-xs-4 pull-right">
        <input type="text" class="form-control" name="q"
            placeholder="Search users" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
  
  <!-- FIM   -->  
  
    <a href="{{route('advogados.create')}}" class="btn btn-primary btn-add "><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Nome</th>
          <th>OAB</th>
          <th>UF</th>
          <th>Fone</th>
          <th>E-mail</th>
          <th width="100px">Ações</th>
        </tr>
      
        @foreach($advogados as $advogado)
       <tr>
            <td>{{$advogado->nome}}</td>
            <td>{{$advogado->oab}}</td>     
            <td>{{$advogado->uf}}</td>
            <td>{{$advogado->telefone}}</td>
            <td>{{$advogado->email}}</td>
            <td>
                 <a href="{{route('advogados.edit',$advogado->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('advogados.show',$advogado->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
    
        @endforeach
    
    </table>
{!! $advogados->links()!!}
@endsection