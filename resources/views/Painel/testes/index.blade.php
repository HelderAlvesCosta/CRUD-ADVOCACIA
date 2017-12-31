@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')
    <h1 class="title-pg">Listagem dos Testes</h1>
  
  <!-- INICIO   -->  
  <div class="form-group input-group">
   
     <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
     <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 
  </div>
  <!-- FIM   -->  
  
 <a href="{{route('testes.create')}}" class="btn btn-primary btn-add "><span class="glyphicon glyphicon-plus"> </span>Cadastrar </a> 

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
       @if(isset($testes))
       @foreach($testes as $teste)
       <tr>
 
           <td>{{$teste->nome}}</td>
            <td>{{$teste->email}}</td>     
            <td>
       <!--          <a href="{{route('testes.edit',$teste->id)}}" title="Editar usuário" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
        <a href="{{route('testes.show',$teste->id)}}" title="Visualisar usuário" class="actions delete">
                    <span class=" glyphicon glyphicon-eye-open"></span>
                </a> -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $teste->id; ?>">
  Launch demo modal
</button>
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" 
           data-whatever="<?php echo $teste->id; ?>"
           data-whatevernome="<?php echo $teste->nome; ?>"
           data-whateveremail="<?php echo $teste->email; ?>">Open modal for @mdo</button>
     
     
            </td>     


       </tr>
     
   <!-- Modal 1 -->
<div class="modal fade" id="exampleModal<?php echo $teste->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{$teste->id}}</p>
    
          <p>{{$teste->nome}}</p>
            <p>{{$teste->email}}</p>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!-- Fim Modal 1 -->
<!-- Modal 2 -->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message </h4>
      </div>
      <div class="modal-body">
  <!--   form inicio -->
<!--  {!!Form::model(null,['route' => ['testes.update',$teste->id],'class' => 'form-horizontal','method' => 'post' ])!!}-->
 <form class="form-horizontal" role="form" id="form-direction" method="post" action="{{action('\App\Http\Controllers\Painel\TestesController@store')}}"> 

{{ csrf_field() }}

        <div class="form-group">
             <label for="recipient" class="control-label">Id:</label>
             <input name="id" type="text" class="form-control" id="recipient">
        </div>
   
         <div class="form-group">
             <label for="recipient-name" class="control-label">Nome:</label>
             <input name="nome" type="text" class="form-control" id="recipient-nome">
        </div>
        <div class="form-group">
            <label for="message-text" class="control-label">Email</label>
            <textarea name="email" class="form-control" id="email"></textarea>
        </div>
<!--
	<input name="id" type="hidden" class="form-control" id="id" value="">
-->			
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="mysaveButton" class="btn btn-danger">Alterar</button> 
        {!! Form::close() !!}
  <!--    </form> -->

   
   <!--    form  fim -->
	
      </div>
  </div>
</div>
<!-- Fim Modal 2 -->

       @endforeach
        @elseif(isset($message))
	   <p style="color:red;font-size:160%;">{{ $message }}</p>
	@endif
        </tbody>
    </table>
 
<script>

    $('#exampleModal2').on('show.bs.modal', function (event) {
 // alert('oiiiiiiiiiiiiiii');
  
        var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')  // Extract info from data-*
  var recipientnome = button.data('whatevernome')  // Extract info from data-*
  var recipientemail = button.data('whateveremail')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
  
  modal.find('#id').val(recipient)
  modal.find('#recipient-nome').val(recipientnome)
  modal.find('#email').val(recipientemail)
  //$('input#txt_consulta').quicksearch('table#tabela tbody tr')
  
  $("#mysaveButton").click(function(e){
        e.preventDefault()
        var $form = $("#form-direction");
 
        $.ajax({
           // method: $form.attr('method'),
           method: "post",
          
            //           url: $form.attr('action'),
            url: $form.attr('\App\Http\Controllers\Painel\TestesController@store'),
            data: $form.serialize(),
            success: function (data, status) {
                
                if(data.error){
                    return;
                }
                alert(data.success); // THis is success message
                $('#exampleModal2').modal('hide');  // Your modal Id
            },
            error: function (result) {
   
            }
        });

    });
		  
});
        
        
        
           </script>
 
    @if(isset($testes))
       {!! $testes->links()!!}
    @endif
@endsection