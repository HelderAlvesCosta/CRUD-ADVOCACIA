@extends('painel.templlates.template')
@extends('layouts.app')

@section('Content')


<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">HOME</a></li>
    <li><a href="#menu1">Requerentes</a></li>
    <li><a href="#menu2">Advogados</a></li>
  </ul>

  <div class="tab-content">
    
    <div id="home" class="tab-pane fade in active">
        @include('/painel/processos.processo_edit')
       
    </div>

    <!-- NOVO Requerente INICIO -->
    <div id="menu1" class="tab-pane fade">
        @include('/painel/processos.requerente_edit')
      
    </div>
 
    <div id="menu2" class="tab-pane fade">
        @include('/painel/processos.advogado_edit')
    
    </div>
    
  </div>

</div>

    <script>
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
    
    </script>

 @endsection  