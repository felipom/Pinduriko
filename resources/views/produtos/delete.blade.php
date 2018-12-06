@extends('layouts.app')
@section('content')
<center><h1 class="nav-link">Excluir Nota Fiscal</h1>
<hr>
<form action="/produtos/{{$produtos->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<p class="nav-link">Você realmente deseja excluir a nota fiscal de <b>{{$produtos->client}}</b>?</p>
	<input class="btn ab" type="submit" value="Voltar">
	<input class="btn ab" type="submit" value="Deletar">
</form>
</center>
@endsection