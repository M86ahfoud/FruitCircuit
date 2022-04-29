@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col">
                <a href="/Admin/Category/creer" class="btn btn-primary mb-5"> Ajouter une categorie</a>
                <table class=" table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="row">
                                        <a href="/Admin/Category/{{ $category->id }}/modifier" class="col btn btn-success"> Modifier
                                        </a>
                                        <div class="col-9">
                                            <form action="/Admin/Category/{{ $category->id }}" method="POST">
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