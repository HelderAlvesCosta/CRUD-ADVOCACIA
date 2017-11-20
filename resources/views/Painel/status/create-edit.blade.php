@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('status.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Status: <b> {{$statu->descricao or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($statu) ) 
    {!!Form::model($statu,['route' => ['status.update',$statu->id],'class' => 'form','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'status.store','class' => 'form'])!!} 
@endif

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    <div class='form-group'>
       {!!Form::text('descricao',null,['class' => 'form-control','placeholder' => 'Descrição:'])!!}
    </div>
   

   {!!Form::submit('Enviar',['class' => 'btn btn-primary'])!!}

  {!!Form::close(['route' => 'status.store','class' => 'form'])!!} 

@endsection