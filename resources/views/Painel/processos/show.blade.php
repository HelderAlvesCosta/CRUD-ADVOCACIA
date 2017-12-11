@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('processos.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Processo: <b>{{$processo->nome}}</b> 
</h1>
    
<p> <b>Número:</b> {{$processo->numero}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['processos.destroy', $processo->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Processo: $processo->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

