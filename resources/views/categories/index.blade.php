@extends('layouts.base')

@section('content')
   <p>{{ 'categories' }}</P> 

    @foreach ($categories as $category)
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <p> {{ $category->name }} </p>

                    <a class="btn btn-primary" href="/categorie/{{ $category->id }}">Voir </a>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection
