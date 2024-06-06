<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-- CSS Style -->
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <header>
            <nav class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/posts/create">Adicionar Postagem</a></li>
                        @auth
                        <li><a href="/dashboard">Minhas postagens</a></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Registra-se</a></li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="row">
                <div class="col-md-12">
                    @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
    </body>
</html>
