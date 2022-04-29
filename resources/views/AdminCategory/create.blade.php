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
                        <label for="name">Nom</label>
                       <input type="text" name="name" id="name" class="form-conctrol" value="{{ old('name') }}">
                    </div>
                    
                    <button class="btn btn-primary mt-3">Ajouter</button>
                </form>

            </div>


        </div>
    </div>
    
@endsection