@extends('layouts.base')


@section('content')

<div class="row">
    <div class="col-lg-5">
        <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->nom }}">
    </div>
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-body">
                <h1>{{ $product->prix }}</h1>
                <div class="mb-4">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection