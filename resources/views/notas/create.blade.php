@extends('layouts.app')
@section('content')
<h1 class="nav-link">Cadastrar Nota</h1>
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
<form action="/notas" method="post">
	{{ csrf_field() }}
	<p class="nav-link">Título: <input type="text" name="title">
	<p class="nav-link">Dia: <input type="text" name="day">
	<p class="nav-link">Data: <input type="date" name="scheduledto">
	<p class="nav-link">Horas cumpridas: <input type="time" name="hour">
	<p class="nav-link">Descrição: <input type="text" name="description">
	<br><br>
	<input class="btn ab"type="submit" value="Salvar">
</form>
@endsection