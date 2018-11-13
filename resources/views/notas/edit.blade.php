@extends('layouts.app')
@section('content')
<center><h1>Formulário de Edição da Nota {{$notas->id}}</h1>
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
	Título: 		<input type="text" name="title" value="{{$notas->title}}"><br><br>
	Descrição:		<input type="text" name="description" value="{{$notas->description}}"><br><br>
	Agendado para:  <input type="datetime-local" name="scheduledto" value="{{$notas->scheduledto}}"><br><br>
	<input type="submit" value="Salvar">
</form>
</center>
@endsection