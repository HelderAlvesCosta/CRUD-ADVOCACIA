@extends('site.template.template1') 

@section('content')
<h1> Home Page do Site</h1>

{{$xss or 'não existe '}}
@if( $var1 = '123')
   <p> é igual </p>
@else
   <p> não é igual </p>
@endif

@unless( $var1 = '123' )
    <p> não é igual </p>

@endunless

@for($i=0; $i<10; $i++)
    <p>Valor: {{$i}} </p>
@endfor

@include('site.includes.sidebar',compact('var1'))

@endsection
@push('scripts')
  <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">

@endpush