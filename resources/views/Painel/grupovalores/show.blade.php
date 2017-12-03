@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('grupovalores.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Corretor: <b>{{$grupovalore->nome}}</b> 
</h1>
    
<p> <b>Grupo:</b> {{$grupovalore->id}} </p> 
<p> <b>Valor:</b> {{$grupovalore->valor}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['grupovalores.destroy', $grupovalore->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Grupo de valor: $grupovalore->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

