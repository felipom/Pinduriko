@extends('layouts.app')

@section('content')
<div class="container">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        Seja bem vindo
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div><br>
    <center>
        <h4 class="h7 btn"><a class="ab" href="/produtos"> Produtos </a></h4>
    </center>
</div>
@endsection