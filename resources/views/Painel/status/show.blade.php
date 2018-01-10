@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('status.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Status: <b>{{$statu->descricao}}</b> 
</h1>
    
<p> <b>Código:</b> {{$statu->id}} </p> 
<p> <b>Descrição:</b> {{$statu->descricao}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['status.destroy', $statu->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Status: $statu->descricao",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

