@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">Listagem dos Advogados</h1>
  
  <!-- INICIO   -->  
  <div class="form-group input-group">
   
     <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
     <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
  </div>
  <!-- FIM   -->  
  
 <a href="{{route('advogados.create')}}" class="btn btn-primary btn-add "><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a> 

<!--  <table class="table table-striped"> -->
    <table id="tabela" class="table table-hover table-striped table-condensed"> 
        <thead>
        <tr  bgcolor="#CCC" style="color:#fff;" >
            <th ><b>NOME</b></th>
          <th ><b>OAB</b></th>
          <th ><b>UF</b></th>
          <th ><b>FONE</b></th>
          <th ><b>E-MAIL</b></th>
          <th ><b>BANCO</b></th>
          <th ><b>AGENCIA</b></th>
          <th ><b>CONTA</b></th>
          <th ><b>TIPO</b></th>
       
          <th width="100x"><b>AÇÕES</b></th>
        </tr>
        </thead>
        
       <tbody>
       @if(isset($advogados))
       @foreach($advogados as $advogado)
       <tr>
            <td>{{$advogado->nome}}</td>
            <td>{{$advogado->oab}}</td>     
            <td>{{$advogado->uf}}</td>
            <td>{{$advogado->telefone}}</td>
            <td>{{$advogado->email}}</td>
            <td>{{$advogado->banco}}</td>
            <td>{{$advogado->agencia}}</td>
            <td>{{$advogado->conta}}</td>
            <td>{{$advogado->tipo}}</td>
           
            <td>
                           
                
                 <a href="{{route('advogados.edit',$advogado->id)}}" title="Editar advogado" class="btn btn-primary btn-add">
                    <span  class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="{{route('advogados.show',$advogado->id)}}" title="Visualisar advogado" class="btn btn-success btn-add" >
                    <span class="glyphicon glyphicon-eye-open"></span>
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
 
    @if(isset($advogados))
       {!! $advogados->links()!!}
    @endif
@endsection