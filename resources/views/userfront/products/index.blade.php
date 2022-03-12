@extends('layouts.front')

@section("title")
{{ $category->name }}
@endsection

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")

<div class="py-5">
    <div class="container">
        <div class="row">
            <h3><strong> {{ $category->name }}</strong></h3>
            @foreach ($products as $item)
            <div class="col-md-3">
                <a href="{{ url('category/'.$category->slug.'/'.$item->slug) }}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/products/'.$item->image) }}" alt="image">
                    <div class="card-body">
                        <h4>{{ $item->name }}</h4>
                        <small>{{ $item->selling_price}}</small>
                    </div>
                </div>
            </a>
                </div> 
            @endforeach
        
        </div>
    </div>
</div>

@endsection

