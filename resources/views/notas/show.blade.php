@extends('layouts.app')
@section('content')
<h1 class="nav-link">Nota <b>{{$notas->title}}</b></h1>
<hr>
<p class="nav-link">
<b]>Título:</b> {{$notas->title}}

<b]>Data:</b> {{\Carbon\Carbon::parse($notas->scheduledto)->format('d/m/Y')}}

<b>Descrição:</b> {{$notas->description}}

<br>
@auth
	<a class="btn" href="/notas/{{$notas->id}}/edit">Editar</a> 
	<a class="btn" href="/notas/{{$notas->id}}/delete">Deletar</a>
@endauth

@endsection


<!-- \Carbon\Carbon::parse($notas->scheduledto)->format('d/m/Y')  -->