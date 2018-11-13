@extends('layouts.app')
@section('content')
<center><h1>Excluir Registro</h1>
<hr>
<form action="/notas/{{$notas->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<p>Você realmente deseja excluir a notas {{$notas->id}}?</p>
	<input type="submit" value="Deletar">
</form>
</center>
@endsection