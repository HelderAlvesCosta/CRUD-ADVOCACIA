<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
    
       <title>{{$title or 'Painel Curso'}} </title> 
       
       <!-- inicio filtro -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
   <!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     -->   
        <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}"> 
       <link rel="stylesheet"  href="{{url('css/app.css')}}"> 
     
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      
   
          
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
       <!-- fim -->
      
       <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
      <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/multi-select.css')}}"> 
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/prism.css')}}"> 
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/chosen.css')}}"> 
      
       <!-- BootStrap -->
     <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}">
     <script type="text/javascript" src="{{ asset('js/cidades-estados.js') }}"></script>
    
    </head>    

    <body>
        <div class="container">
           @yield('Content') 
        </div>   
        
       <!-- Script INICIO -->
            <script type="text/javascript" src="{{ asset('js/jquery.maskMoney.min.js') }}"></script> 
            <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.min.js') }}"></script> 
      
       <script type="text/javascript" src="{{ asset('js/jquery.multi-select.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/chosen.jquery.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/prism.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/init.js') }}"></script>
       
     <script>
        $( document ).ready( function(){
		// Aqui fazemos uso do plugin MASKED INPUT
		$("#data").mask("99/99/9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#telefone").mask("(99) 9999-9999");
		$("#celular").mask("(99)99999-9999");
               // Aqui fazemos uso do plugin MASK MONEY
                $("#valor_condenação_aud").maskMoney({prefix:'R$ ', thousands:',',decimal:'.'});
                $("#valor").maskMoney({prefix:'R$ ', thousands:',',decimal:'.'});
                $("#comissao").maskMoney({prefix:'R$ ', thousands:',',decimal:'.'});        
                // Bancos
                mascara();
                $("#banco").change(function() {
                 mascara()
                });
                $("#tipo").mask("9");
                $("#myform").submit(function () {
                      var Value_cond = $("#valor_condenação_aud").val();
                  
                     // Remove os caracteres que não são dígitos:
                    Value_cond = Value_cond.replace(/\D/g, '');
                  
        // Atualiza o valor no campo do formulário:
                    $("#valor_condenação_aud").val( Value_cond/100 );
                  
                    });
           
                $("#myformgrupo").submit(function () {
                      var Value = $("#valor").val();
                  
                     // Remove os caracteres que não são dígitos:
                    Value = Value.replace(/\D/g, '');
                  
        // Atualiza o valor no campo do formulário:
                    $("#valor").val( Value/100 );
                  
                    });
                $("#form_corretor").submit(function () {
                      var Value = $("#comissao").val();
                  
                     // Remove os caracteres que não são dígitos:
                    Value = Value.replace(/\D/g, '');
                  
        // Atualiza o valor no campo do formulário:
                    $("#comissao").val( Value/100 );
                  
                    });


              }); 
        function mascara() {
           var banco = $("#banco").val();;
           if(banco == 'Caixa Economica'){
                 $('#agencia').mask('9999999');
                 $('#conta').mask('99999999-9');
              }else if(banco == 'Banco do Brasil'){
                 $('#agencia').mask('999999');
                 $('#conta').mask('9999999999999');
              }else if(banco == 'Bradesco'){
                 $('#agencia').mask('9999');
                 $('#conta').mask('9999999-9');
              }else if(banco == 'Itaú'){
                 $('#agencia').mask('9999');
                 $('#conta').mask('99999-9');
              }else{
                 $('#agencia').mask('9999999');
                 $('#conta').mask('99999999999999');
              }
       
        return ;              // The function returns the product of p1 and p2
       
        }
       </script>

       <!-- Script FIM -->
<script type="text/javascript">
  // run pre selected options
 $('#opcoes').multiSelect();
  
  </script>

  
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    
});
</script>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>

    <script>
        $(document).ready(function(){
            $('.published').iCheck({
                checkboxClass: 'icheckbox_square-yellow',
                radioClass: 'iradio_square-yellow',
                increaseArea: '20%'
            });
        });
        
    </script>

 

   <script type="text/javascript">
        
         
        $(document).on('click', '.index-modal', function() {
           $('.modal-title').text('Add');
           $('#indexModal').modal('show');
        });
   
        // add a new post
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
 
        $('.modal-footer').on('click', '.add', function() {
            
            $.ajax({
                type: 'POST',
                url: 'produtos',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'descricao': $('#descricao_add').val(),
                    'categoria': $('#categoria_add').val()
                 },
                success: function(data) {
                    $('.errorDescricao').addClass('hidden');
                    $('.errorCategoria').addClass('hidden');
              
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorDescricao').removeClass('hidden');
                            $('.errorCategoria').removeClass('hidden');

                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
  $('#postTable').prepend("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.descricao + "</td><td>" + data.categoria_id + "</td><td>Just now!</td><td><button class='show-modal btn btn-success'data-id='" + data.id + "' data-descricao='" + data.descricao +"'data-categoria-id='" + data.categoria_id +"'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id +"' data-descricao='" +data.descricao + "'data-categoria_id='" +data.categoria_id + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-descricao='" + data.descricao + "' data-categoria_id='" + data.categoria_id + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                            $('.new_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
            });
        });

        // Show a post
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#descricao_show').val($(this).data('descricao'));
            $('#categoria_show').val($(this).data('categoria_id'));
            $('#showModal').modal('show');
        });


        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#descricao_edit').val($(this).data('descricao'));
            $('#categoria_edit').val($(this).data('categoria_id'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'produtos/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'descricao': $('#descricao_edit').val(),
                    'categoria': $('#categoria_edit').val()
                },
                success: function(data) {
               
                    $('.errorDescricao').addClass('hidden');
                    $('.errorCategoria').addClass('hidden');
               
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorDescricao').removeClass('hidden');
                            $('.errorCategoria').removeClass('hidden');
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
 $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.descricao + "</td><td>" + data.categoria_id + "</td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-descricao='" + data.descricao + "'data-categoria_id='" + data.categoria_id + "' ><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-descricao='" + data.descricao + "'data-categoria_id='" + data.categoria_id + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "'data-descricao='" + data.descricao + "'data-categoria_id='" +data.categoria_id + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");                        
                        if (data.is_published) {
                            $('.edit_published').prop('checked', true);
                            $('.edit_published').closest('tr').addClass('warning');
                        }
                        $('.edit_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.edit_published').on('ifToggled', function(event) {
                            $(this).closest('tr').toggleClass('warning');
                        });
                        $('.edit_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                
                                   data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    // empty
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                }
            });
        });
        
        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#descricao_delete').val($(this).data('descricao'));
            $('#categoria_delete').val($(this).data('categoria_id'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'produtos/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });
    
    <!-- Inicio CATEGORIA -->
    
       $('.modal-footer').on('click', '.addCategoria', function() {
            alert('oiiiiiiiiiiiiiiii');
            $.ajax({
                type: 'POST',
                url: 'categorias',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'descricao': $('#descricao_addCategoria').val()
                },
                success: function(data) {
                    $('.errorDescricao').addClass('hidden');
                $('#modal-dialog').load("produtos");
                    if ((data.errors)) {
                            setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorDescricao').removeClass('hidden');
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
  $('#categoriaTable').prepend("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.descricao + "</td><td>Just now!</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-descricao='" + data.descricao + "' ><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-descricao='" + data.descricao + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-descricao='" + data.descricao + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
  $('#categoria_add').prepend('<option value="'+data.id+'" selected>'+data.descricao+'</option>');

                            $('.new_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
                error: function(result) {
                    alert("Data not found"+result);
                }
            });
        
        });

        // Show a post
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#descricao_show').val($(this).data('descricao'));
            $('#showModal').modal('show');
        });


        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#descricao_edit').val($(this).data('descricao'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'categorias/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'descricao': $('#descricao_edit').val()
                },
                success: function(data) {
               
                    $('.errorDescricao').addClass('hidden');
               
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorDescricao').removeClass('hidden');
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                       $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.descricao + "</td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-descricao='" + data.descricao + "' ><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                        if (data.is_published) {
                            $('.edit_published').prop('checked', true);
                            $('.edit_published').closest('tr').addClass('warning');
                        }
                        $('.edit_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.edit_published').on('ifToggled', function(event) {
                            $(this).closest('tr').toggleClass('warning');
                        });
                        $('.edit_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    // empty
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                }
            });
        });
        
        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#descricao_delete').val($(this).data('descricao'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'categorias/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });

    <!-- Fim CATEGORIA -->
     
    </script>

  
    </body>
</html>