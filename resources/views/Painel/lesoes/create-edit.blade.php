@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('lesoes.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Lesões: <b> {{$lesoe->id or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($lesoe) ) 
    {!!Form::model($lesoe,['route' => ['lesoes.update',$lesoe->id],'class' => 'form','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'lesoes.store','class' => 'form'])!!} 
@endif

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <!-- Helder 10 /////////////////////////////////////////////////////////////// --> 
  
    <div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lesão</div>

                <div class="panel-body">
                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Descrição</label>
                            <div class="col-md-8">
                                <textarea class="field" id="descricao" name="descricao" cols="55" rows="10" >{{$lesoe->descricao or old('descricao')}}</textarea>
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
                            <div class="col-md-8 col-md-offset-0">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
            
        </div>
    </div>
</div>
 <!--  {!!Form::submit('Enviar',['class' => 'btn btn-primary'])!!} -->

  {!!Form::close(['route' => 'lesoes.store','class' => 'form'])!!} 

@endsection