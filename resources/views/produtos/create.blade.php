@extends('layouts.app')
@section('content')
<h1 class="nav-link">Gerar Nota Fiscal</h1>
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
<form action="/produtos" method="post">
	{{ csrf_field() }}
	<p class="nav-link">Cliente: <input type="text" name="client">
	<p class="nav-link">Produto: <input type="text" name="product">
	<p class="nav-link">Preço: <input type="float" name="price">
	<p class="nav-link">Data: <input type="date" name="scheduledto">
	<br><br>
	<input class="btn ab"type="submit" value="Salvar">
</form>
@endsection