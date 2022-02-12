@extends('layouts.layout')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row">

        @foreach ($apostas as $aposta)
            <div class="col-7 mx-auto mt-5
                @if($aposta->win == true) alert alert-success
                @else alert alert-danger @endif">
                <p class="">Quantia apostada: {{$aposta->quantia_apostada}}
                            Multiplicador: {{$aposta->mult}}X</p>
                <p class="">Saldo pós aposta: {{$aposta->saldo_pos_aposta}}</p>
            </div>
        @endforeach

    </div>
    <div class="row">
        <div class="mx-auto mt-3">
            {{$apostas->links()}}
        </div>
    </div>

</div>

@endsection
