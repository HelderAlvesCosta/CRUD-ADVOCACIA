@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('advogados.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Advogado: <b>{{$advogado->nome}}</b> 
</h1>
    
<p> <b>OAB:</b> {{$advogado->oab}} </p> 
<p> <b>UF:</b> {{$advogado->uf}} </p> 
<p> <b>Telefone:</b> {{$advogado->telefone}} </p> 
<p> <b>E-Mail:</b> {{$advogado->email}} </p> 
<p> <b>Banco:</b> {{$advogado->banco}} </p> 
<p> <b>Agência:</b> {{$advogado->agencia}} </p> 
<p> <b>Conta:</b> {{$advogado->conta}} </p> 
<p> <b>Tipo:</b> {{$advogado->tipo}} </p> 

<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['advogados.destroy', $advogado->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Advogado: $advogado->nome",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

