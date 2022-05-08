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
                    @csrf
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                       <input type="text" name="nom" id="nom" class="form-conctrol" value="{{ old('nom') }}">
                    </div>
                    <div class="mb-3">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control" vlaue="{{ old('description') }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prix">Prix</label>
                        <input type="number" name="prix" id="prix" class="form-control" value="{{ old('prix') }}">
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                    </div>
                    <div class="mb-3">
                        <label for="promotion">Promotion</label>
                        <input type="number" name="promotion" id="promotion" class="form-control"
                            value="{{ old('promorion') }}">
                    </div>
                    <div class="mb-3">
                        <label for="category">Catégorie</label>
                        <select name="category" id="category" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary mt-3">Ajouter</button>
                </form>
            </div>
        </div>
    </div>  
@endsection