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
        @if(Route::is('pages.home') )
            <header class="header-personal-home">
        @elseif(!Route::is('pages.home') )
            <header class="header-personal-other">
        @endif
                
            <div class="container-home header-top">
                <div class="row align-items-center">
    
                    <div class="col-4 d-none d-md-block d-lg-block">
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="bi bi-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="bi bi-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="bi bi-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                    <!-- site logo -->
                        <a href="/" class="d-block text-logo text-dark text-decoration-none">
                            <span class="fs-4">Blog <img class="d-inline-block mb-3" src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/lettre-creative.svg" alt="Le C du logo Créative Formation" style="width: 30px">réative</span>
                        </a>
                    </div>
    
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <!-- header buttons -->
                        <div class="header-buttons float-md-end mt-4 mt-md-0">
                            @if (Route::has('login'))
                                @auth
                                    <span class="icon-button-log ms-2 float-end float-md-none">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="nav-link mr-1 icon-button">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </a>
                                        </form>
                                    </span>
                            @else
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="nav-link mr-1 underline-anim">S'inscrire</a>
                                    @endif
                                        <span class="icon-button-log ms-2 float-end float-md-none">
                                            <a href="{{ route('login') }}" class="nav-link mr-1 icon-button"><i class="bi bi-box-arrow-in-left"></i></a>
                                        </span>
                                @endauth
                            @endif
                        </div>
                    </div>
    
                </div>
            </div>

            <nav class="navbar navbar-expand-lg clone">
                <div class="container-xl">
                    
                    <div class="collapse navbar-collapse justify-content-center centered-nav">
                        <!-- menus -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <span class="search icon-button">
                                    <a href="/" class="nav-link mr-1 underline-anim">Accueil</a>
                                </span>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <span class="search icon-button">
                                        <a href="/admin/panel" class="nav-link mr-1 underline-anim">Dashboard</a>
                                    </span>
                                </li>
                            @endauth
                        </ul>
                    </div>
    
                </div>
            </nav>
        </header>
​
    @if(Route::is('pages.home') )
        <div class="container" id="news" style="margin-bottom:150px">
    @elseif(!Route::is('pages.home') )
        <div class="container-other" id="news" style="margin-bottom:150px">
    @endif
    
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