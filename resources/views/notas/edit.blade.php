@extends('layouts.app')
@section('content')
<h1 class="h7">Editando nota <b>{{$notas->id}}</b></h1>
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

<form action="/notas/{{$notas->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<h3 class="h7">Título: </h3> <input type="text" name="title" value="{{$notas->title}}"><br><br>
	<h3 class="h7">Dia: </h3> <input type="text" name="day" value="{{$notas->day}}"><br><br>
	<h3 class="h7">Data: </h3> <input type="date" name="scheduledto" value="{{$notas->scheduledto}}"><br><br>
	<h3 class="h7">Horas Cumpridas: </h3> <input type="text" name="hour" value="{{$notas->hour}}"><br><br>
	<h3 class="h7">Descrição: </h3> <input type="text" name="description" value="{{$notas->description}}"><br><br>
	<input class="btn" type="submit" value="Salvar">
</form>

@endsection