@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col">
                <a href="/Admin/Produit/creer" class="btn btn-primary mb-5"> Ajouter un produit</a>
                <table class=" table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>
                                    <a class="card-img-top">
                                        <img src="{{ $produit->image }}" class="img-fluid" alt=" Card image cap" ,
                                            style="width: 60px">
                                    </a>
                                </td>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->prix }}€</td>
                                <td>
                                    <div class="row">
                                        <a href="/Admin/Produit/{{ $produit->id }}" class="col btn btn-success"> Modifier
                                        </a>
                                        <div class="col-9">
                                            <form action="/Admin/Produit/{{ $produit->id }}" method="POST">
                                                @csrf @method('delete')

                                                <button class="col-16 btn btn-danger"
                                                    onclick="return confirm(' voulez-vous supprimer le produit ?')">
                                                    Supprimer
                                                </button>

                                            </form>


                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
