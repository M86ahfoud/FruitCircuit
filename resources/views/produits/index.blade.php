@extends('layouts.base')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"> Produit</h1>
            <p class="lead text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae,
                veniam, eius aliquam quidem rem sunt nam quaerat facilis ex error placeat ipsa illo sed inventore
                soluta ipsum cumque atque ea?</p>
        </div>
    </section>
    <div class="row">
        @include('layouts.sidbar')
        <div class="col">
            <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">

                @foreach ($produits as $produit)
                    <div class="card">
                        <a class="card-img-top">
                            <img src="{{ $produit->image }}" class="img-fluid" alt=" Card image cap">
                        </a>
                        <h5 class="card-title"><a class="card-titl" href="produit.html"> {{ $produit->nom }} </a>
                        </h5>
                        <p class="card-title">{{$produit->category?->name}}</p>
                        <p class="card-text"> {{ $produit->description }} </p>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger w-100" href="#">{{ $produit->prix }}</a>
                            </div>
                            <div class="col">
                                <a href="/produits/{{ $produit->id }}" class="btn btn-success w-100"> Voir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    {!! $produits->links() !!}
@endsection
