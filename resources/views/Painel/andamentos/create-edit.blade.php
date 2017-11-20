@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('andamentos.index',$id)}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Andamento: <b> {{$andamento->nome or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($andamento) ) 
    {!!Form::model($andamento,['route' => ['andamentos.update',$advogado->id],'class' => 'form','method' => 'put' ])!!}
@else
    {!!Form::open(['route' => 'andamentos.store','class' => 'form'])!!} 
@endif

<input type="hidden" name="_token" value="{{csrf_token()}}">

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Andamento do Processo</div>

                <div class="panel-body">

                       <div class="form-group">
                            <label for="data" class="col-md-4 control-label">Data</label>

                            <div class="col-md-6">
                                {{ Form::hidden('processo_id', $id) }}
                                {!! Form::date('data', \Carbon\Carbon::now(), ['class'=>'form-control'])!!}
   
                            </div>
                        </div>
                  
                     <div class="form-group">
                            <label for="status_id" class="col-md-4 control-label">Nome do Status</label>

                            <div class="col-md-6">
                            <select name='status_id' class='form-control'>
                                  <option>Escolha o Status </option>
                                  @foreach($status as $statu)
                                    <option value='{{$statu->id}}' 
                                            >{{$statu->descricao}}</option>
     
                                  @endforeach
                            </select> 
                              
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


{!!Form::close(['route' => 'andamentos.store','class' => 'form'])!!} 

@endsection