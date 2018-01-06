<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
    
       <title>{{$title or 'Painel Curso'}} </title> 
       <meta name="_token" content="{{ csrf_token() }}"/>
    
       <!-- ( CHOSEN LESOES ) os 3 --> 
       <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
       <link href="{{ asset('css/prism.css') }}" rel="stylesheet"> 
       <link href="{{ asset('css/chosen.css') }}" rel="stylesheet"> 
        
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
 
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
    
       <!-- Tem que ficar aqui Cidades e Estados --> 
       <script type="text/javascript" src="{{ asset('js/cidades-estados-1.2-utf8.js') }}"></script> 
    
       <!-- Máscaras -->   
       <script type="text/javascript" src="{{ asset('js/jquery.maskMoney.min.js') }}"></script> 
       <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.min.js') }}"></script> 
   
        <script>
            $( document ).ready( function(){
		// Aqui fazemos uso do plugin MASKED INPUT
		$("#data").mask("99/99/9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#telefone").mask("(99) 9999-9999");
         	$("#telefone_advogado").mask("(99) 9999-9999");
			
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
                 $("#banco_advogado").change(function() {
                 mascara2()
                });
               
                $("#tipo").mask("9");
                $("#tipo_advogado").mask("9");
                    
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

            function mascara2() {
               var banco = $("#banco_advogado").val();;
               if(banco == 'Caixa Economica'){
                     $('#agencia_advogado').mask('9999999');
                     $('#conta_advogado').mask('99999999-9');
                  }else if(banco == 'Banco do Brasil'){
                     $('#agencia_advogado').mask('999999');
                     $('#conta_advogado').mask('9999999999999');
                  }else if(banco == 'Bradesco'){
                     $('#agencia_advogado').mask('9999');
                     $('#conta_advogado').mask('9999999-9');
                  }else if(banco == 'Itaú'){
                     $('#agencia_advogado').mask('9999');
                     $('#conta_advogado').mask('99999-9');
                  }else{
                     $('#agencia_advogado').mask('9999999');
                     $('#conta_advogado').mask('99999999999999');
                  }

                 return ;              // The function returns the product of p1 and p2

            }


        </script>
        
       <!--    AJAX    -->
       <!-- Requerentes -->
       <script type="text/javascript">

           $( document ).ready(function() { 
 
                //create new task / update existing task
                $('.form-group').on('click', '.add_requerente', function(e) {
     
                  var url = "http://localhost/crud_advocacia/public/requerents";

                  alert('oiiiiiiiiiii-----');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
      alert('oixxxxxxxxxxx');

                    e.preventDefault(); 
    alert('yyyyyyyyyyyy');
                    var formData = {
                        'nome': $('#nome').val(),
                        'sexo': $('#sexo').val(),
                        'nacionalidade': $('#nacionalidade').val(),
                        'estado_civil': $('#estado_civil').val(),
                        'profissao': $('#profissao').val(),
                        'rg': $('#rg').val(),
                        'cpf': $('#cpf').val(),
                        'endereco': $('#endereco').val(),
                        'bairro': $('#bairro').val(),
                        'cidade': $('#cidade').val(),
                        'uf': $('#uf').val(),
                        'cep': $('#cep').val(),
                        'telefone': $('#telefone').val(),
                        'email': $('#email').val(),
                        'banco': $('#banco').val(),
                        'agencia': $('#agencia').val(),
                        'conta': $('#conta').val(),
                        'tipo': $('#tipo').val()
                       }

                    //used to determine the http verb to use [add=POST], [update=PUT]

                    var type = "POST"; //for creating new resource
                    var my_url = url;

                    console.log(formData);
            alert('222222222222222'+my_url);
                    $.ajax({
                        type: type,
                        url: my_url,
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
                           alert('SUCCESS !!!');
                
                           $('#requerente_sel').prepend('<option value="'+data.id+'" selected>'+data.nome+'</option>');
                           <!-- Necessário ao CHOSEN  --> 
                           $('#requerente_sel').trigger("chosen:updated");                           
                        },
                        error: function (data) {
                            alert('3333333333333');

                            console.log('Error:', data);
                        }
                    });
                });
            });

         </script>

         <!-- Advogados -->
         <script type="text/javascript">

           $( document ).ready(function() { 

                //create new task / update existing task
                $('.form-group').on('click', '.add_advogado', function(e) {
                   
                   var url = "http://localhost/crud_advocacia/public/advogados";

                   alert('oiiiiiiiiiii-----advogado');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
      alert('oixxxxxxxxxxx');

                    e.preventDefault(); 
    alert('yyyyyyyyyyyy');
                    var formData = {
                        'nome': $('#nome_advogado').val(),
                        'oab': $('#oab').val(),
                        'uf': $('#uf_advogado').val(),
                        'telefone': $('#telefone_advogado').val(),
                        'email': $('#email_advogado').val(),
                        'banco': $('#banco_advogado').val(),
                        'agencia': $('#agencia_advogado').val(),
                        'conta': $('#conta_advogado').val(),
                        'tipo': $('#tipo_advogado').val()
                       }
                    //used to determine the http verb to use [add=POST], [update=PUT]

                    var type = "POST"; //for creating new resource
                    var my_url = url;

                    console.log(formData);
            alert('222222222222222'+$('#nome_advogado').val()+'/'+$('#oab').val()+'/'+$('#uf_advogado').val()+'/'+$('#telefone_advogado').val()+'/'+$('#email_advogado').val()+'/'+$('#banco_advogado').val()+'/'+$('#agencia_advogado').val()+'/'+$('#conta_advogado').val()+'/'+$('#tipo_advogado').val());
                     
                    $.ajax({
                        type: type,
                        url: my_url,
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
                           alert('SUCCESS !!!');
                
                           $('#advogado_sel').prepend('<option value="'+data.id+'" selected>'+data.nome+'</option>');
                           <!-- Necessário ao CHOSEN  --> 
                           $('#advogado_sel').trigger("chosen:updated");                           
                        },
                        error: function (data) {
                            alert('3333333333333');

                            console.log('Error:', data);
                        }
                    });
                });
            });

          </script>

    </head>    

    <body>
        <div class="container">
           @yield('Content') 
        </div>   
       
        
     
     <script type="text/javascript">
         // run pre selected options
         $('#opcoes').multiSelect();
     </script>
    
   

     <!-- Tem que ficar aqui ( CHOSEN LESOES ) os 3 --> 
     <script type="text/javascript" src="{{ asset('js/chosen.jquery.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/prism.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/init.js') }}"></script>

     
    </body>
</html>