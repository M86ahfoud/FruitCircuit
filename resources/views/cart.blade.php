@extends('layouts.base')


@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
                Panier
            </h1>
        </div>
    </section>
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Produit</th>
                                <th scope="col" class="text-center">Quantité</th>
                                <th scope="col" class="text-right">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('cart', [])['items'] ?? [] as $id => $product)
                                <tr>
                                    <td><img width="75" src="{{ $product['image'] }}" /></td>
                                    <td>{{ $product['name'] }}</td>
                                    <td><input class="form-control" type="text" value="{{ $product['quantity'] }}" />
                                    </td>
                                    <td class="text-right">{{ $product['formated_price'] }}</td>
                                    <td class="text-right">
                                        <form action="/panier/{{ $id }}" method="POST">
                                            @csrf @method('delete')
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash">supprimer</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Sous-Total</td>
                                <td class="text-right">
                                    {{ number_format(session('cart', [])['total'] ?? 0, 2, ',', '') }} €</td>
                            </tr>
                            <tr>
                                <td>Frais de livraison</td>
                                <td class="text-right">5,90 €</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td class="text-right">
                                    <strong>{{ number_format((session('cart', [])['total'] ?? 0) + 5.9, 2, ',', '') }} €</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <button class="btn w-100 btn-light">Continuer vos achats</button>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <button class="btn btn-lg w-100 btn-success text-uppercase">Commander</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
