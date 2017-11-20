@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
     <a href="{{route('requerentes.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Requerente: <b>{{$requerente->nome}}</b> 
</h1>
    
<p> <b>Nome:</b> {{$requerente->nome}} </p> 
<p> <b>Sexo:</b> {{$requerente->sexo}} </p> 
<p> <b>Nacionalidade:</b> {{$requerente->nacionalidade}} </p> 
<p> <b>Estado civil:</b> {{$requerente->estado_civil}} </p> 
<p> <b>Profissão:</b> {{$requerente->profissao}} </p> 
<p> <b>RG:</b> {{$requerente->rg}} </p> 
<p> <b>CPF:</b> {{$requerente->cpf}} </p> 

<p> <b>Endereço:</b> {{$requerente->endereco}} </p> 
<p> <b>Bairro:</b> {{$requerente->bairro}} </p> 
<p> <b>Cidade:</b> {{$requerente->cidade}} </p> 
<p> <b>UF:</b> {{$requerente->uf}} </p> 
<p> <b>CEP:</b> {{$requerente->cep}} </p>

<p> <b>Telefone:</b> {{$requerente->telefone}} </p> 
<p> <b>E-Mail:</b> {{$requerente->email}} </p> 

<p> <b>Banco:</b> {{$requerente->banco}} </p>
<p> <b>Agencia:</b> {{$requerente->agencia}} </p> 
<p> <b>Conta:</b> {{$requerente->conta}} </p> 
<p> <b>Tipo:</b> {{$requerente->tipo}} </p> 




<hr>
@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

{!!Form::open(['route' => ['requerentes.destroy', $requerente->id],'method' => 'DELETE' ])!!}
    {!!Form::submit("Deletar Requerente: $requerente->name",['class' => 'btn btn-danger'])!!}
{!!Form::close()!!}
      
    
@endsection

