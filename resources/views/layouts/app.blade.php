<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Blog Créative</title>
    @vite(['resources/css/app.css'])
</head>
<body>
​
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Blog <img class="d-inline-block mb-3" src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/lettre-creative.svg" alt="Le C du logo Créative Formation" style="width: 30px">réative</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link active mr-1" id="accueil">Accueil</a></li>
                @auth
                    <li class="nav-item"><a href="/admin/panel" class="nav-link mr-1">Admin</a></li>
                @endauth
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();" class="nav-link mr-1">
                                    {{ 'Se Déconnecter' }}
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-info">Se Connecter</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">S'inscrire</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </header>
    </div>
​
    <div class="container" id="news" style="margin-bottom:150px">
​
        @yield('content')
        
    </div>
​
    <div class="container d-flex justify-content-between">
        <p>© 2022 Créative - Tous droits réservés</p>
        <p><a href="#accueil" class="btn btn-outline-secondary">↑</a></p>

    </div>
    

    <script type="text/javascript" src=" {{ asset('js/script.js') }}"></script>
</body>
</html>