@extends('layouts.base')

@section('content')
    <div class="container mt-3 animation">
        <div  class="position row">
            <div class="col">
                <img src="/images/image_fruit.jpg" alt="Card image cap" style="width:300px; height:300px" />

            </div>
            <div class="col-3">
                <h1>Bienvenue au FLASH PROMO</h1>
            </div>
            <div class="col-4">
                <img src="/images/image_fruit2.jpg" alt="Card image cap" style="width:300px; height:300px" />
            </div>
            
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        @foreach ($produits as $key => $produit)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ $produit->image }}" class="d-block w-100" alt="First Slide">
                            </div>
                        @endforeach
                    </div>


                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
                <div class="col-12 col-md-3">
                    <div class="card h-100">
                        <div class="card-header bg-success text-white text-uppercase">                        
                            Meilleur prix
                        </div>

                        <img class="img-fluid border-0" src="{{ $cheapestProduit->image }}" alt="Card image cap">
                        <div class="card-body">

                            <h4 class="card-title text-center">
                                <a class="nom" href="product.html"
                                    title="View Product">{{ $cheapestProduit->nom }}</a>
                            </h4>

                            <p class="card-text"> {{ $cheapestProduit->description }}</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">{{ $cheapestProduit->prix }}</p>
                                </div>
                                <div class="col">
                                    <a href="/produits/{{ $cheapestProduit->id }}" class="btn btn-success w-100">Voir</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm">
                <div class="titre">
                    <p> Les derniers produits arrivés au magasin </p>
                </div>
                <div class="entouré">

                    <div class="card-body">
                        <div class="row">
                            @foreach ($lastProduits as $lastProduit)
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $lastProduit->image }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"> <a class="nom" href="Product.html"
                                                    title="View Product">
                                                    {{ $lastProduit->nom }} </a>
                                            </h4>
                                            <p class="card-text"> {{ $lastProduit->description }}</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger w-100">{{ $lastProduit->prix }} </p>
                                                </div>
                                                <div class="col">
                                                    <a href="/produits/{{ $lastProduit->id }}"
                                                        class="btn btn-success w-100">Voir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-sm">
                    <div class="titre">
                        Les derniers produits commentés
                    </div>
                    <div class="entouré">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($bestProducts as $product)
                                    <div class="col-sm">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ $product->image }}"
                                                alt="{{ $product->nom }}">
                                            <div class="card-body">
                                                <h4 class="card-title"><a class="nom"
                                                        href="/produits/{{ $product->id }}"
                                                        title="View Product">{{ $product->nom }}</a></h4>
                                                <p class="card-text">{{ $product->description }}</p>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="btn btn-danger w-100">{{ $product->prix }}</p>
                                                    </div>
                                                    <div class="col">
                                                        <a href="/produits/{{ $product->id }}"
                                                            class="btn btn-success w-100">Voir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
