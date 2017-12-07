@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('grupovalores.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Grupo de Valor: <b> {{$grupovalore->id or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($grupovalore) ) 
    {!!Form::model($grupovalore,['route' => ['grupovalores.update',$grupovalore->id],'id' => 'myformgrupo','name' => 'myformgrupo','class' => 'form','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'grupovalores.store','id' => 'myformgrupo','name' => 'myformgrupo','class' => 'form'])!!} 
@endif

<input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dados do Grupo de valor</div>

                <div class="panel-body">

                       <div class="form-group">
                            <label for="valor" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Valor</label>

                            <div class="col-md-6">
                                <input id="valor" type="text" class="form-control" name="valor" value="{{$grupovalore->valor or old('valor')}}" required>
                            </div>
                        </div>
                       
                       
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-0">
                     <button type="submit" class="btn btn-primary">
                                Enviar
                     </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

{!!Form::close(['route' => 'grupovalores.store','class' => 'form'])!!} 

@endsection