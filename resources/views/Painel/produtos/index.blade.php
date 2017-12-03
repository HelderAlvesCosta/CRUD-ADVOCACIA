@extends('painel.templlates.template')

@section('Content')
    <h1 class="title-pg">Listagem dos Produtos</h1>

    
  <!--  <a href="{{url('/painel/produtos/create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>-->
    <a href="{{route('produtos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
  
    <table class="table table-striped">
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th width="100px">Ações</th>
        </tr>
       @foreach($products as $product)
       <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>     
            <td>
              <!--  <a href="{{url("/painel/produtos/{$product->id}/edit")}}" class="actions edit"> -->
                <a href="{{route('produtos.edit',$product->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('produtos.show',$product->id)}}" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
    
    </table>
{!! $products->links()!!}
@endsection