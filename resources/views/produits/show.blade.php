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
        <div class="card shadow">
           <p class="price">{{ $product->promotion() }}</p>
                    @if ($product->promotion)
                    <p class="price_discounted">{{ $product->prix() }}</p>
                    @endif
            <form method="post" action="/panier/{{$product->id}}">
                @csrf
                <div class="mb-3">
                    <label>Quantité :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                <i class="fa fa-minus"></i>

                            </button>
                        </div>
                        <input type="text" class="form-control" id="quantity" name="quantity" min="1" max="100" value="1">
                        <div class="input-group-append">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-lg w-100 text-uppercase">
                    <i class="fa fa-shopping-cart"></i> Ajouter
                </button>
            </form>
            
        </div>
    </div>
</div>

<div>
    @foreach ($product->comments as $comment)
        <div class="review">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <meta itemprop="datePublished" content="01-01-2016">{{$comment->created_at->translatedFormat('d F Y')}}
            @for($i = 0; $i< $comment->note; $i++)
            <span class="fa fa-star"></span>
            @endfor
            par {{$comment->name}}
            <p class="blockquote">
                <p class="mb-0">{{$comment->message}}</p>
            </p>
        </div>
    @endforeach
</div>

<div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0 list-unstyled">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="/commentaire/{{$product->id}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                placeholder="Votre nom" value="{{ old('name') }}">
        </div>
        <div>
            <label for="object">Note</label>
            <select name="note" class="form-control" id="object">
                @for ($i = 0; $i <= 5; $i++)
                <option value="{{ $i }}">{{$i}}</option>
                @endfor 
            </select>
        </div class="mb-3">
        <div class="mb-3">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" id="message" rows="6" value="{{ old('message') }}"></textarea>
        </div>
        <div class="mx-auto">
            <button type="submit" class="btn btn-primary text-right">Ajouter</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    //Plus & Minus for Quantity product
    $(document).ready(function(){
        var quantity = 1;
        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });
        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if(quantity > 1){
                $('#quantity').val(quantity - 1);
            }
        });
    });
</script>

@endsection