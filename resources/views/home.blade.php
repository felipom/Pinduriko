@extends('layouts.app')

@section('content')
<div class="container">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div><br>
    <center>
        <h4><a href="/notas">Notas</a></h4>
    </center>
</div>
@endsection