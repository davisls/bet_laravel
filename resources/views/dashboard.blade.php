@extends('layouts.layout')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($apostas as $aposta)
            <div class="col-7 mx-auto mt-5 alert card-personalizado text-white">
                <p class="">Quantia apostada: {{$aposta->quantia_apostada}};&nbsp&nbsp&nbsp
                            Multiplicador: {{$aposta->mult}}X</p>
                <p class="">
                    Saldo antes da aposta: {{$aposta->saldo_antes_aposta}};&nbsp&nbsp&nbsp
                    <span class="@if($aposta->win == true)
                        text-sucesso
                    @else
                        text-failed
                    @endif
                    ">
                        Saldo pós aposta: {{$aposta->saldo_pos_aposta}}
                    </span>
                </p>
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
