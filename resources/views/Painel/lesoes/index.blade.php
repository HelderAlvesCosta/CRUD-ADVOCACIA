@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">Listagem das Lesões</h1>
   <!-- INICIO   -->  
     <div class="form-group input-group">
   
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
     </div>
  <!-- FIM   -->  
  
    <a href="{{route('lesoes.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a>  
<!--   <table class="table table-striped">-->  

   <!-- <table class="table table-condensed table-striped"> -->
    <table id="tabela" class="table table-hover table-striped table-condensed"> 
        <thead>
        <tr>
          <th>Número</th>
          <th>Descrição</th>
          <th width=72">Ações</th> 
        </tr>
        </thead>
        <tbody>
        @if(isset($lesoes))
        @foreach($lesoes as $lesoe)
       <tr>
            <td>{{$lesoe->id}}</td> 
            <td>
               <textarea name="" id="" cols="150" rows="2">{{$lesoe->descricao}}</textarea>
            </td>
            <td>
                <a href="{{route('lesoes.edit',$lesoe->id)}}"  title="Editar lesão"  class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('lesoes.show',$lesoe->id)}}" title="Visualisar lesão"  class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> 
            </td>     

       </tr>
       @endforeach
       @elseif(isset($message))
	   <p style="color:red;font-size:160%;">{{ $message }}</p>
       @endif
    </tbody>
    </table>
    
    <script>
            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>
 

@if(isset($lesoes))
   {!! $lesoes->links()!!}
@endif

@endsection