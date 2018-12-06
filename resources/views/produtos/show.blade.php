@extends('layouts.app')
@section('content')
<h1 class="nav-link">Nota Fiscal de <b>{{$produtos->client}}</b></h1>
<hr>
<p class="nav-link">
<h4 class="h7"><b>Cliente:</b></h4> <h5 class="h7">{{$produtos->client}}</h5>
<br>
<h4 class="h7"><b>Produto:</b></h4> <h5 class="h7">{{$produtos->product}}</h5>
<br>
<h4 class="h7"><b>Preço:</b></h4> <h5 class="h7">{{$produtos->price}}</h5>
<br>
<h4 class="h7"><b>Data:</b></h4> <h5 class="h7">{{\Carbon\Carbon::parse($produtos->scheduledto)->format('d/m/Y')}}</h5>

<br>
@auth
<br>
	<a class="btn ab" href="/produtos/{{$produtos->id}}/edit">Editar</a> 
	<a class="btn ab" href="/produtos/{{$produtos->id}}/delete">Deletar</a>
@endauth

@endsection


<!-- \Carbon\Carbon::parse($produtos->scheduledto)->format('d/m/Y')  -->