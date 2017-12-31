@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">Listagem dos Usuários</h1>
  
  <!-- INICIO   -->  
  <div class="form-group input-group">
   
     <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
     <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
  </div>
  <!-- FIM   -->  
  
 <a href="{{route('users.create')}}" class="btn btn-primary btn-add "><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a> 

<!--  <table class="table table-striped"> -->
    <table id="tabela" class="table table-hover table-striped table-condensed"> 
        <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th width="72px">Ações</th>
        </tr>
        </thead>
        
       <tbody>
       @if(isset($users))
       @foreach($users as $user)
       <tr>
 
           <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>     
            <td>
                 <a href="{{route('users.edit',$user->id)}}" title="Editar usuário" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
        <a href="{{route('users.show',$user->id)}}" title="Visualisar usuário" class="actions delete">
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
 
    @if(isset($users))
       {!! $users->links()!!}
    @endif
@endsection