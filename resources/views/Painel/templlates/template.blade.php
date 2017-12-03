<!DOCTYPE html>

<html>
    <head>
       <title>{{$title or 'Painel Curso'}} </title> 
       
       <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
       <link rel="stylesheet"  href="{{url('assets/painel/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}"> 
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
       <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/jquery.multi-select.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/chosen.jquery.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/prism.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/init.js') }}"></script>
       
       <script>
           $(document).ready(function(){
           $('.data').mask('00/00/0000');
           });
           $('.tempo').mask('00:00:00');
           $('.data_tempo').mask('00/00/0000 00:00:00');
           $('.cep').mask('00000-000');
           $('.tel').mask('(00) 00000-0000');
           $('.ddd_tel').mask('(00) 0000-0000');
           $('.cpf').mask('000.000.000-00');
           $('.cnpj').mask('00.000.000/0000-00');
           $('.dinheiro').mask('0000000,00' , { reverse : true});
           $('.dinheiro2').mask("#.##0,00" , { reverse:true});
       </script>
       
      
 
       <!-- Script FIM -->
<script type="text/javascript">
  // run pre selected options
 $('#opcoes').multiSelect();
  
  </script>

    
    </body>
</html>