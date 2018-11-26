@extends('layouts.app')
@section('content')
<center><h1 class="nav-link">Excluir Nota</h1>
<hr>
<form action="/notas/{{$notas->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<p class="nav-link">Você realmente deseja excluir a nota <b>{{$notas->title}}</b>?</p>
	<input class="btn" type="submit" value="Voltar">
	<input class="btn" type="submit" value="Deletar">
</form>
</center>
@endsection