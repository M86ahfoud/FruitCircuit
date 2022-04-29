<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
    <script href="{{asset('js/script.js')}}" type="text/javascript"></script>
    <link href="{{ asset('fontawesome-free-6.1.1-web/css/all.css') }}" rel="stylesheet" type="text/css">
    @livewireStyles
    <style>
        
    </style>
</head>

<body>
    <div id="app">
         <!--<h1>Acccueil</h1>
    <div>
        <p><a href="/">Accueil</a></p>
        <p><a href="/produits">Produits</a></p>
        <p><a href="/produits/12-iphone-xs/{id}">show produit</a></p>
        <p><a href="/categorie/12-smartphone/{category}">show category</a></p>
        <a href="/contact">Contact</a>
    </div>-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/produits">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                    </ul>
                    <form methode="GET" action="#" class="d-flex">
                        <input class="form-control me-2 " name="search" placeholder="Search" aria-label="Search" value="{{request('search')}}">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        <a class="btn btn-success btn-sm ms-3 d-inline-flex align-items-center" href="/panier">
                            <i class="fa fa-shopping-cart me-2"></i> Panier
                            <span class="badge badge-light">{{ count(session('cart', [])) }}</span>
                        </a>
                    </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>                  
                </div>
            </div>
        </nav>
        <div class="container py-5 my-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content')
            
        </div>
    </div>
        <footer >
            <div class="container">
               <!-- <div class="row">
                    <div class="col-md-3 col-4 col-xl-3">
                        <h5>Contact</h5>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <ul class="list-unstyled">
                            <li><i class="fa fa-home ms-2"></i>{{config('services.contact.name')}}</li>
                            <li><i class="fa fa-phone ms-2"></i>{{config('services.contact.phone')}}</li>
                            <li><i class="fa fa-envelope ms-2"></i>{{config('services.contact.mail')}}</li>
                            <li><i class="fa-solid fa-location-dot"></i>{{config('services.Adresse.rue')}},{{config('services.Adresse.postacode')}},{{config('services.Adresse.city')}}</li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                        <h5>Information</h5>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <ul class="list-unstyled">
                            <li><a href="/contact">Nous contacter</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Conditions de livraison</a></li>
                            <li><a href="#">Mentions légales</a></li>
                            <li><a href="#">CGV</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                        <h5>Mon compte</h5>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <ul class="list-unstyled">
                            <li><a href="#">Mes informations</a></li>
                            <li><a href="#">Code promo</a></li>
                            <li><a href="#">Adresse de livraison</a></li>
                            <li><a href="#">Moyens de paiement</a></li>
                            <li><a href="#">Information du compte</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                        <h5>Retrouvez-nous</h5>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <ul class="list-unstyled">
                            <li><a href="#">Magazine</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Linkedin</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-center">Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}</p>
            </div>-->
        </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>
