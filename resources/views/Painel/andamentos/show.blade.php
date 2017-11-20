@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('andamentos.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Andamento: <b>{{$andamento->nome}}</b> 
</h1>
    
<p> <b>OAB:</b> {{$andamento->oab}} </p> 
<p> <b>UF:</b> {{$andamento->uf}} </p> 
<p> <b>Telefone:</b> {{$andamento->telefone}} </p> 
<p> <b>E-Mail:</b> {{$andamento->email}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['andamentos.destroy', $andamento->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Andamento: $andamento->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

