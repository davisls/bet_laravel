
@extends('../layouts.layout')

@section('title', 'Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto mt-5">
                <div class="card ">
                    <div class="card-body">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Esqueceu sua senha? Sem problemas. Apenas nos informe seu endereço de e-mail e nós iremos te enviar um link com a sua senha e uma opção para alterá-la.') }}
                        </div>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-jet-validation-errors class="mb-4" />

                        <form class="form-group" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="block">
                                <x-jet-label for="email" value="{{ __('Email:') }}" />
                                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div>
                                <x-jet-button class="btn btn-dark btn-block mt-3">
                                    {{ __('Enviar Email para resetar senha') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

