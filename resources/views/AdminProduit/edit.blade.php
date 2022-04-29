@extends('layouts.admin')


@section('content')
    <div class="container-fluid">

        <div class="row">

                @include('layouts.sidebar')

            <div class="col-6 add">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-conctrol" value="{{ old('nom', $produit->nom) }}">
                    </div>
                    <div class="mb-3">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $produit->description)}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="prix">Prix</label>
                        <input type="number" name="prix" id="prix" class="form-control" value="{{ old('prix', $produit->prix) }}">
                    </div>

                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $produit->slug) }}">
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" >
                        <img src="{{ $produit->image }}" class="img-fluid" alt=" Card image cap", style="width: 60px" >
                        <input type="hidden" name="hidden_image" value="{{$produit->image}}">
                    </div>

                    <div class="mb-3">
                        <label for="promotion">Promotion</label>
                        <input type="number" name="promotion" id="promotion" class="form-control"
                            value="{{ old('promorion', $produit->promotion) }}">
                    </div>

                    <div class="mb-3">
                        <label for="category">Catégorie</label>
                        <select name="category" id="category" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary mt-3">Modifier</button>
                </form>

            </div>


        </div>
    </div>
    
@endsection

