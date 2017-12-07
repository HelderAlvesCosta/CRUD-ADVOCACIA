<!DOCTYPE html>

<html>
    <head>
       <title>{{$title or 'Painel Curso'}} </title> 
       
       <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/bootstrap.css')}}"> 
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/multi-select.css')}}"> 
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/prism.css')}}"> 
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/chosen.css')}}"> 
      
       <!-- BootStrap -->
     <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}">
     <script type="text/javascript" src="{{ asset('js/cidades-estados.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

    </head>    

    <body>
        <div class="container">
           @yield('Content') 
        </div>   
        
       <!-- Script INICIO -->
            <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
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
                     
              }); 
       </script>

      
 
       <!-- Script FIM -->
<script type="text/javascript">
  // run pre selected options
 $('#opcoes').multiSelect();
  
  </script>

    
    </body>
</html>