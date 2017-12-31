@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('testes.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Usuário: <b>{{$teste->nome}}</b> 
</h1>
    
<p> <b>E-mail:</b> {{$teste->email}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['testes.destroy', $teste->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Usuário: $teste->nome",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

