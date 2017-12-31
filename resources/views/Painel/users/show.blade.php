@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('users.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Usuário: <b>{{$user->name}}</b> 
</h1>
    
<p> <b>E-mail:</b> {{$user->email}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['users.destroy', $user->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Usuário: $user->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

