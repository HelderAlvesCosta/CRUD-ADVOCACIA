@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg" align="center">
    <a href="{{route('status.index')}}" ><span class='glyphicon glyphicon-fast-backward'> </a>
    Gestão Status: <font style="color:red;" size="3"> <b>{{$statu->descricao or '<Novo>'}}</b> </font>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif


@if( isset($requerente) ) 
    {!!Form::model($statu,['route' => ['status.update',$statu->id],'class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'status.store','class' => 'form-horizontal'])!!} 
@endif

    <input type="hidden" name="_token" value="{{csrf_token()}}">
 
 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><font style="color:red;" size="3"> <b>Dados do Status</b> </font></div>

                <div class="panel-body">

                        <div class="form-group">
                            <label for="id" class="col-md-4 control-label">Código</label>

                            <div class="col-md-6">
                                <input id="id" name="id"  type="text" class="form-control" disabled value="{{$statu->id or old('id')}}">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <input id="descricao" name="descricao"  type="text" class="form-control" name="descricao" value="{{$statu->descricao or old('descricao')}}">

                            </div>
                        </div>
                       <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                      Enviar
                                </button>
                            </div>
                        </div>
                    {!!Form::close(['route' => 'status.store','class' => 'form'])!!} 
                </div>
    
            </div>
            
            
        </div>
    </div>
</div>

   
  

@endsection