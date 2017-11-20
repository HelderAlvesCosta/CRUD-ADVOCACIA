@extends('painel.templlates.template')

@section('Content')

<h1 class="title-pg">
    <a href="{{route('produtos.index')}}"> <span class='glyphicon glyphicon-fast-backward'> </span> </a>
    Gestão Produto: <b> {{$product->name or 'Novo'}}</b>
</h1>

@if( isset($errors) && count($errors) > 0  )
    <div class="alert alert-danger"> </div>    
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif

@if( isset($product) ) 
   <!--  <form class='form' method="post" action="{{route('produtos.update',$product->id)}}"> -->
    <!-- {!!method_field('PUT') !!} -->    
    {!!Form::model($product,['route' => ['produtos.update',$product->id],'class' => 'form','method' => 'put' ])!!}

@else
    <!-- <form class='form' method="post" action="{{route('produtos.store')}}"> -->
    {!!Form::open(['route' => 'produtos.store','class' => 'form'])!!} 
            
@endif

<!-- <form class='form' method="post" action="{{url('/painel/produtos')}}">-->

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    <!--{ csrf_field()}-->
    <div class='form-group'>
  <!--  <input type='text' name='name' placeholder="Nome:" class='form-control' value="{{$product->name or old('name')}}"> -->
    {!!Form::text('name',null,['class' => 'form-control','placeholder' => 'Nome:'])!!}
    </div>
    <div class='form-group'>
    <label> 
       <!-- <input type='checkbox' name='active' value ='1' @if(isset($product) && $product->active == '1') checked @endif> -->
        {!!Form::checkbox('active')!!}
        
        Ativo?
    </label>
    </div>
    <div class='form-group'>
  <!--  <input type='text' name='number' placeholder="Número:" class='form-control' value="{{$product->number or old('number')}}"> -->
        {!!Form::text('number',null,['class' => 'form-control','placeholder' => 'Número:'])!!}
       

    </div>
  
    <div class='form-group'>
  <!--  <select name='category' class='form-control'>
        <option>Escolha a Categoria </option>
        @foreach($categorys as $category)
          <option value='{{$category}}'
                  @if(isset($product) && $product->category == $category)
                     selected
                  @endif
                  >{{$category}}</option>
     
        @endforeach
    </select> -->
    {!!Form::select('category',$categorys,null,['class' => 'form-control',])!!}
       
    </div>
   
    <div class='form-group'>
  <!--  <textarea name='description' placeholder='Descrição:' class='form-control' value="{{$product->description or old('description')}}"> </textarea> -->
     {!!Form::textarea('description',null,['class' => 'form-control','placeholder' => 'Descrição:'])!!}

    </div>
   <!--  <button class='btn btn-primary'>Enviar</button> -->
    {!!Form::submit('Enviar',['class' => 'btn btn-primary'])!!}
       

<!-- </form> -->
  {!!Form::close(['route' => 'produtos.store','class' => 'form'])!!} 

@endsection