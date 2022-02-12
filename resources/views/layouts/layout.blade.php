<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../css/style.css">
    </head>
    <body>

        <header>

            <nav class="navbar navbar-expand-lg nav-bg">

                <a class="navbar-brand nav-logo" href="/">RandBet</a>

                <div class="ml-auto">
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link link-nav mx-1" href="/login">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-nav mx-1" href="/register">Cadastrar-se</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                <a class="nav-link link-nav mx-1">R${{$user->money}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-nav mx-1" href="/dashboard">Histórico</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout"
                                        class="nav-link link-nav mx-1"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit()"
                                    >
                                    Sair
                                    </a>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>

        </header>

        @yield('content')

    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
