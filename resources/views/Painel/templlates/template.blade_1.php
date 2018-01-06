<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
    
       <title>{{$title or 'Painel Curso'}} </title> 
       <meta name="_token" content="{{ csrf_token() }}"/>
       
       <!-- inicio filtro -->
      
    <!-- Trago inicio -->
        
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">
        <!-- icheck checkboxes -->
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
 
        <link rel="stylesheet" href="https://raw.githubusercontent.com/fronteed/icheck/1.x/skins/square/yellow.css"> 

        <!-- toastr notifications -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
        <!-- Trago fim -->
      
    <!-- Trago inicio -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
   
    
     
        <script type="text/javascript">

           $( document ).ready(function() { 

                var url = "http://localhost/crud_advocacia/public/requerents";

                //create new task / update existing task
                $('.form-group').on('click', '.add_requerente', function(e) {

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
                        },
                        error: function (data) {
                            alert('3333333333333');

                            console.log('Error:', data);
                        }
                    });
                });
            });

         </script>
    
        <script type="text/javascript" src="{{ asset('js/cidades-estados-1.2-utf8.js') }}"></script> 
        
    
        <style>
            .panel-heading {
                padding: 0;
            }
            .panel-heading ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            .panel-heading li {
                float: left;
                border-right:1px solid #bbb;
                display: block;
                padding: 14px 16px;
                text-align: center;
            }
            .panel-heading li:last-child:hover {
                background-color: #ccc;
            }
            .panel-heading li:last-child {
                border-right: none;
            }
            .panel-heading li a:hover {
                text-decoration: none;
            }

            .table.table-bordered tbody td {
                vertical-align: baseline;
            }
        </style>

    <!-- Trago fim -->
       
    
    </head>    

    <body>
        <div class="container">
           @yield('Content') 
        </div>   
    
     
       <script type="text/javascript" src="{{ asset('js/jquery.maskMoney.min.js') }}"></script> 
       <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.min.js') }}"></script> 
   
       <script type="text/javascript" src="{{ asset('js/jquery.multi-select.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/chosen.jquery.js') }}"></script>
     
       <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/prism.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/init.js') }}"></script>
    
       <!-- estava aqui dando erro -->
     
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
   
     
       <script>
            $(document).ready(function(){
                $('.published').iCheck({
                    checkboxClass: 'icheckbox_square-yellow',
                    radioClass: 'iradio_square-yellow',
                    increaseArea: '20%'
                });
            });

       </script>

    </body>
</html>