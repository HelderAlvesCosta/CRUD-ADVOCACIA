@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('lesoes.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Lesão: <b>{{$lesoe->nome}}</b> 
</h1>
    
<p> <b>Número:</b> {{$lesoe->numero}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['lesoes.destroy', $lesoe->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Lesão: $lesoe->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

