@extends('layouts.app')
@section('content')
<h1 class="nav-link">Nota <b>{{$notas->title}}</b></h1>
<hr>
<p class="nav-link">
<h4 class="h7"><b>Título:</b></h4> <h5 class="h7">{{$notas->title}}</h5>
<br>
<h4 class="h7"><b>Data:</b></h4> <h5 class="h7">{{\Carbon\Carbon::parse($notas->scheduledto)->format('d/m/Y')}}</h5>
<br>
<h4 class="h7"><b>Horas Cumpridas:</b></h4> <h5 class="h7">{{\Carbon\Carbon::parse($notas->scheduledto)->format('h:m')}} horas</h5>
<br>
<h4 class="h7"><b>Descrição:</b></h4> <h5 class="h7">{{$notas->description}}</h5>

<br>
@auth
<br>
	<a class="btn ab" href="/notas/{{$notas->id}}/edit">Editar</a> 
	<a class="btn ab" href="/notas/{{$notas->id}}/delete">Deletar</a>
@endauth

@endsection


<!-- \Carbon\Carbon::parse($notas->scheduledto)->format('d/m/Y')  -->