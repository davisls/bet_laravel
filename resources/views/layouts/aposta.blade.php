@extends('layouts.layout')

@section('title', 'Home')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-7 mx-auto mt-5 card-personalizado">
                <p class="p-title">
                    Coloque abaixo o seu número da sorte e a quantia
                    que deseja apostar.
                </p>

                @if(session('msg-failed'))
                    <p class="alert alert-danger col-11 mx-auto">{{session('msg-failed')}}</p>
                @endif

                @if(session('msg-success'))
                    <p class="alert alert-success col-11 mx-auto">{{session('msg-success')}}</p>
                @endif

                <form action="/aposta/@yield('porcentagem')" method="POST" class="form-group text-center col-5 mx-auto">
                    @csrf
                    <input type="hidden" name="min" value="@yield('min')">
                    <input type="hidden" name="max" value="@yield('max')">
                    <input type="hidden" name="mult" value="@yield('mult')">
                    <input placeholder="Quantia à apostar" class="form-control mb-3" type="text" name="quantia">
                    <input placeholder="Número da sorte" class="form-control mb-3" type="text" name="num_apostado">
                    <button class="btn btn-dark form-control">Apostar</button>
                </form>
            </div>

        </div>

    </div>

@endsection
