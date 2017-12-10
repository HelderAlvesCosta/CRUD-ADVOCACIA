@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('advogados.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Advogado: <b>{{$advogado->nome}}</b> 
</h1>
    
<p> <b>OAB:</b> {{$advogado->oab}} </p> 
<p> <b>UF:</b> {{$advogado->uf}} </p> 
<p> <b>Cidade:</b> {{$advogado->cidade}} </p> 
<p> <b>Telefone:</b> {{$advogado->telefone}} </p> 
<p> <b>E-Mail:</b> {{$advogado->email}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['advogados.destroy', $advogado->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Advogado: $advogado->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

