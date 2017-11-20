@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('corretores.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Corretor: <b>{{$corretore->nome}}</b> 
</h1>
    
<p> <b>Nome:</b> {{$corretore->nome}} </p> 
<p> <b>RG:</b> {{$corretore->uf}} </p> 
<p> <b>CPF:</b> {{$corretore->telefone}} </p> 
<p> <b>Endereço:</b> {{$corretore->endereco}} </p> 
<p> <b>Bairro:</b> {{$corretore->bairro}} </p> 
<p> <b>Cidade:</b> {{$corretore->cidade}} </p> 
<p> <b>UF:</b> {{$corretore->uf}} </p> 
<p> <b>CEP:</b> {{$corretore->cep}} </p>
<p> <b>Telefone:</b> {{$corretore->telefone}} </p> 
<p> <b>E-Mail:</b> {{$corretore->email}} </p> 
<p> <b>Commissão:</b> {{$corretore->comissao}} </p> 
<p> <b>Banco:</b> {{$corretore->banco}} </p>
<p> <b>Agencia:</b> {{$corretore->agencia}} </p> 
<p> <b>Conta:</b> {{$corretore->conta}} </p> 
<p> <b>Tipo:</b> {{$corretore->tipo}} </p> 




<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['corretores.destroy', $corretore->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Corretor: $corretore->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

