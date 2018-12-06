@extends('layouts.app')
@section('content')
<h1 class="h7">Editando nota <b>{{$produtos->id}}</b></h1>
<hr>

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
	<div class="container">
	  <div class="alert alert-danger">
	    <ul>
	      @foreach ($errors->all() as $error)
	      <li>{{ $error }}</li>
	      @endforeach
	    </ul>
	  </div>
	</div>
  @endif

<form action="/produtos/{{$produtos->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<h3 class="h7">Cliente: </h3> <input type="text" name="client" value="{{$produtos->client}}"><br><br>
	<h3 class="h7">Produto: </h3> <input type="text" name="product" value="{{$produtos->product}}"><br><br>
	<h3 class="h7">Preço: </h3> <input type="text" name="price" value="{{$produtos->price}}"><br><br>
	<h3 class="h7">Data: </h3> <input type="date" name="scheduledto" value="{{$produtos->scheduledto}}"><br><br>
	<input class="btn" type="submit" value="Salvar">
</form>

@endsection