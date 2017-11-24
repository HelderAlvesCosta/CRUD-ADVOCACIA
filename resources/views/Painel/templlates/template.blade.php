<!DOCTYPE html>

<html>
    <head>
       <title>{{$title or 'Painel Curso'}} </title> 
       
       <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}"> 
      
       <!-- BootStrap -->
       <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}">
    </head>    

    <body>
        <div class="container">
           @yield('Content') 
        </div>   
        
       <!-- Script INICIO -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
       <script>
           $(document).ready(function(){
           $('.data').mask('00/00/0000');
           });
           $('.tempo').mask('00:00:00');
           $('.data_tempo').mask('00/00/0000 00:00:00');
           $('.cep').mask('00000-000');
           $('.tel').mask('00000-0000');
           $('.ddd_tel').mask('(00) 0000-0000');
           $('.cpf').mask('000.000.000-00');
           $('.cnpj').mask('00.000.000/0000-00');
           $('.dinheiro').mask('000.000.000.000.000,00' , { reverse : true});
           $('.dinheiro2').mask("#.##0,00" , { reverse:true});
        </script>
       
       <!-- Script FIM -->

    
    </body>
</html>