@extends('layouts.app')
@section('content')
<h1>notas {{$notas->id}}</h1>
<hr>
<h3><b>ID:</b> {{$notas->id}}</h3>
<h3><b>Título:</b> {{$notas->title}}</h3>
<h3><b>Agendado para:</b> {{\Carbon\Carbon::parse($notas->scheduledto)->format('d/m/Y h:m')}}</h3>
<h3><b>Descrição:</b> {{$notas->description}}</h3>
<h3><b>Criada em:</b> {{\Carbon\Carbon::parse($notas->created_at)->format('d/m/Y h:m')}}</h3>
<h3><b>Atualizada em:</b> {{\Carbon\Carbon::parse($notas->updated_at)->format('d/m/Y h:m')}}</h3>

@endsection



<!-- \Carbon\Carbon::parse($notas->scheduledto)->format('d/m/Y h:m')  -->