<div class="col-12 col-md-3">
    <div class="card bg-light mb-3">
        <div class="card-header bg-primary text-white text-uppercase ">
            Filter
        </div>
        <ul class="list-group category_block">
                   <li class="list-group-item"><a href="/Orderasc">Prix ascendant</a></li>
                   <li class="list-group-item"><a href="/Orderdesc">Prix descendant</a></li>
        </ul>
    </div>
    <div class="card bg-light mb-3">
        <div class="card-header bg-primary text-white text-uppercase ">          
            Categories
        </div>
        <ul class="list-group category_block">
                    @foreach ($categories as $category)
                        <li class="list-group-item">
                            <a href="/categorie/{{ $category->id }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
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
