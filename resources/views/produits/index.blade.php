<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    
        @foreach ($produits as $produit)
            <div class="card">
                <a class="card-img-top">
                    <img src="{{ $produit->image }}" class="img-fluid" alt=" Card image cap">
                </a>
                <h5 class="card-title"><a class="card-titl" href="produit.html"> {{ $produit->nom }} </a>
                </h5>
                <p class="card-text"> {{ $produit->description }} </p>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-danger w-100" href="#">{{ $produit->prix }}</a>
                    </div>

                </div>
            </div>
        @endforeach
   


</body>

</html>
