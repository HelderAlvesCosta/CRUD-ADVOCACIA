@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('escritorios.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Escritório: <b>{{$escritorio->nome}}</b> 
</h1>
    
<p> <b>Endereço:</b> {{$escritorio->endereco}} </p> 
<p> <b>Bairro:</b> {{$escritorio->bairro}} </p> 
<p> <b>Cidade:</b> {{$escritorio->cidade}} </p> 
<p> <b>UF:</b> {{$escritorio->uf}} </p> 
<p> <b>CEP:</b> {{$escritorio->cep}} </p> 
<p> <b>Telefone:</b> {{$escritorio->telefone}} </p> 
<p> <b>E-Mail:</b> {{$escritorio->email}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['escritorios.destroy', $escritorio->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Escritório: $escritorio->nome",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

