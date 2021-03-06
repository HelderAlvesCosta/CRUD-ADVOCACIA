@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg" align="center">
    <a href="{{route('lesoes.index')}}" ><span class='glyphicon glyphicon-fast-backward'></a>
    Gestão Lesões: <font style="color:red;" size="3"> <b>{{$lesoe->id or '<Novo>'}}</b> </font>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($lesoe) ) 
    {!!Form::model($lesoe,['route' => ['lesoes.update',$lesoe->id],'class' => 'form-horizontal','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'lesoes.store','class' => 'form-horizontal'])!!} 
@endif

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <!-- Helder 10 /////////////////////////////////////////////////////////////// --> 
  
    <div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><font style="color:red;" size="3"> <b>Lesão</b> </font></div>

                <div class="panel-body">
                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label"><span style="color:red" class="glyphicon glyphicon-star-empty"> </span>Descrição</label>
                            <div class="col-md-8">
                                <textarea class="field" id="descricao" name="descricao" cols="57" rows="10" >{{$lesoe->descricao or old('descricao')}}</textarea>
                           <!--     {{ Form::textarea('descricao'),['cols'=>'80','class'=>'form-control','required' =>'required'] }}-->
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label for="grupo_id" class="col-md-4 control-label">Grupo de lesões</label>

                            <div class="col-md-6">
                            <select name='grupo_id' class='form-control'>
                                  @foreach($grupovalores as $grupovalore)
                                    <option value='{{$grupovalore->id}}' 
                                            @if(isset($lesoe) && $lesoe->grupo_id == $grupovalore->id)
                                                selected
                                            @endif
                                            >{{$grupovalore->id}}</option>
     
                                  @endforeach
                            </select> 
                              
                            </div>
                        </div>

 
              <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
  {!!Form::close(['route' => 'lesoes.store','class' => 'form'])!!} 
          
        </div>
    </div>
</div>
 <!--  {!!Form::submit('Enviar',['class' => 'btn btn-primary'])!!} -->

  
@endsection