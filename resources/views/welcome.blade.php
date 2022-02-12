@extends('layouts.layout')

@section('title', 'Home')

@section('content')

    <div class="container mt-5">

        <div class="row">
            <div class="col-12 col-md-5 card-personalizado text-center mx-auto my-4">
                <p class="p-title">Faça sua aposta com 50% abaixo:</p>

                <p class="text-white">Aposte a quantia que você quiser com uma chance de 50%
                    de sucesso e um multiplicador de <strong>1.2X!</strong>
                </p>

                <a class="btn btn-dark mb-3" href="/aposta_cinquenta">Apostar</a>
            </div>
            <div class="col-12 col-md-5 card-personalizado text-center mx-auto my-4">
                <p class="p-title">Faça sua aposta com 20% abaixo:</p>

                <p class="text-white">Aposte a quantia que você quiser com uma chance de 20%
                    de sucesso e um multiplicador de <strong>4X!</strong>
                </p>

                <a class="btn btn-dark mb-3" href="/aposta_vinte">Apostar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5 card-personalizado text-center mx-auto my-4">
                <p class="p-title">Faça sua aposta com 10% abaixo:</p>

                <p class="text-white">Aposte a quantia que você quiser com uma chance de 10%
                    de sucesso e um multiplicador de <strong>6X!</strong>
                </p>

                <a class="btn btn-dark mb-3" href="/aposta_dez">Apostar</a>
            </div>
            <div class="col-12 col-md-5 card-personalizado text-center mx-auto my-4">
                <p class="p-title">Faça sua aposta com 1% abaixo:</p>

                <p class="text-white">Aposte a quantia que você quiser com uma chance de 1%
                    de sucesso e um multiplicador de <strong>15X!</strong>
                </p>

                <a class="btn btn-dark mb-3" href="/aposta_um">Apostar</a>
            </div>
        </div>

    </div>

@endsection
