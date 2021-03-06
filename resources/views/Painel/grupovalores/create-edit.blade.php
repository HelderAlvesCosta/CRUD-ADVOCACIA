@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg" align="center">
    <a href="{{route('grupovalores.index')}}" > <span class='glyphicon glyphicon-fast-backward'> </a>
    Gestão Grupo de Valor: <font style="color:red;" size="3"> <b>{{$grupovalore->id or  '<Novo>'}}</b> </font>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($grupovalore) ) 
    {!!Form::model($grupovalore,['route' => ['grupovalores.update',$grupovalore->id],'id' => 'myformgrupo','name' => 'myformgrupo','class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'grupovalores.store','id' => 'myformgrupo','name' => 'myformgrupo','class' => 'form-horizontal'])!!} 
@endif

<input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><font style="color:red;" size="3"> <b>Dados do Grupo de valor</b> </font></div>

                <div class="panel-body">

                      <div class="form-group">
                            <label for="id" class="col-md-4 control-label">Grupo</label>

                            <div class="col-md-6">
                                 @if( ! isset($grupovalore) )
                                     <input id="id" type="text" class="form-control" name="id" value="{{$ultimo}}" disabled value="{{$grupovalore->id or old('id')}}" required>
                                 @else
                                     <input id="id" type="text" class="form-control" name="id" value="{{$grupovalore->id}}" disabled value="{{$grupovalore->id or old('id')}}" required>
                                 @endif
                            </div>
                        </div>
        
                       <div class="form-group">
                            <label for="valor" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Valor</label>

                            <div class="col-md-6">
                                <input id="valor" type="text" class="form-control" name="valor" value="{{$grupovalore->valor or old('valor')}}" required>
                            </div>
                        </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                     <button type="submit" class="btn btn-primary">
                                Enviar
                     </button>
                </div>
            </div>
           {!!Form::close(['route' => 'grupovalores.store','class' => 'form'])!!} 
                       
                       
                </div>
            </div>
            
            
        </div>
    </div>
</div>


@endsection