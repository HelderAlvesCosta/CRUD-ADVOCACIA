@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('dadoscorporais.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Dado corporal: <b>{{$dadoscorporai->nome}}</b> 
</h1>
    
<p> <b>Número:</b> {{$dadoscorporai->numero}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['dadoscorporais.destroy', $dadoscorporai->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Dado corporal: $dadoscorporai->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

