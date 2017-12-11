@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('andamentos.index',$process_id)}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Andamento: <b> {{$processos->numero or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($andamento) ) 
    {!!Form::model($andamento,['route' => ['andamentos.update',$andamento->processo_id,$andamento->data],'class' => 'form','method' => 'put' ])!!}
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
                                {{ Form::hidden('processo_id', $process_id) }}
                                @if( isset($andamento) ) 
                                    {!! Form::date('data', \Carbon\Carbon::parse($andamento->data)->format('Y-m-d'), ['class'=>'form-control'])!!} 
                                @else
                                    {!! Form::date('data', \Carbon\Carbon::now(), ['class'=>'form-control'])!!} 
                                @endif   
                                             
                            </div>
                        </div>
                  
                     <div class="form-group">
                            <label for="status_id" class="col-md-4 control-label">Nome do Status</label>

                            <div class="col-md-6">
                          <!--  <select name='status_id' class='form-control'> -->
                             <select data-placeholder="Your Favorite Types of Bear" class="chosen-select-width" tabindex="15">
      
                                @foreach($status as $statu)
                                    <option value='{{$statu->id}}' 
                                            @if(isset($andamento) && $andamento->status_id == $statu->id)
                                                selected
                                            @endif
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