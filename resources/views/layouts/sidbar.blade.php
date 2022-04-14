<div class="col-12 col-md-3">
    <div class="card bg-light mb-3">
        <div class="card-header bg-primary text-white text-uppercase">
            <i class="fa fa-list">

            </i>

        </div>
        <ul class="list-group category_block">
            @if (isset($categories))
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <li class="list-group-item">
                            <a href="/categorie/{{ $category->id }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                @else
                @endif
            @endif

        </ul>
    </div>
    <div class="card bg-light mb-3">
        <div class="card-header bg-success text-white text-uppercase">

            Dernier produit
        </div>

        <img class="img-fluid border-0" src="{{ $lastproduits->image }}" alt="Card image cap">
        <div class="card-body">

            <h4 class="card-title text-center">
                <a href="product.html" title="View Product">{{ $lastproduits->nom }}</a>
            </h4>

            <p class="card-text"> {{ $lastproduits->description }}</p>
            <div class="row">
                <div class="col">
                    <p class="btn btn-danger w-100">{{ $lastproduits->prix }}</p>
                </div>
                <div class="col">
                    <a href='/produits/{{ $lastproduits->id }}' class="btn btn-success w-100">Voir</a>
                </div>
            </div>
        </div>
    </div>
</div>
