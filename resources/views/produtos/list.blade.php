@extends('layouts.app')
@section('content')
<p class=" nav-link h1 text-center">Nota Fiscal</p>

  <!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
  <div class="container">
      <div class="alert alert-success">
        {{\Session::get('success')}}
      </div>
    </div>
  @endif

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
  <div class="container nav-link ">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif

<div class="container ">
@foreach($produtos as $n)
  <br>
  <div class="row">
    <div class="col-md-12">
    <hr>
     <h2 class="h3 nav-link "><a class="as" href="/produtos/{{$n->id}}">{{$n->Client}}</a></h2>
     <p class="h5 nav-link ">Data: <b>{{\Carbon\Carbon::parse($n->scheduledto)->format('d/m/Y')}}</b></p>
<br>
      @auth
          <a class="btn ab" href="/produtos/{{$n->id}}">Visualizar</a>
          <a class="btn ab" href="/produtos/{{$n->id}}/edit">Editar</a> 
          <a class="btn ab" href="/produtos/{{$n->id}}/delete">Deletar</a>
      @endauth
    </div>
  </div>
  <br>
@endforeach
</div>

{{ $produtos->links() }}

@auth

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p class="text-center">
      <a class="btn ab" href="/produtos/create">Criar Nota Fiscal</a></p>
    </div>
</div>
</div>
@endauth

@endsection