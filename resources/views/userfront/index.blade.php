@extends('layouts.front')

@section("title")
welcome to our online shop
@endsection

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<div class="py-5">
    <div class="container">
        <div class="row">
            <h3><strong> featured products</strong></h3>
            @foreach ($featured_products as $item)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('assets/uploads/products/'.$item->image) }}" alt="image">
                    <div class="card-body">
                        <h4>{{ $item->name }}</h4>
                        <small>{{ $item->selling_price}}</small>
                    </div>
                </div>
                </div> 
            @endforeach
        
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h3><strong> trending categories</strong></h3>
            @foreach ($trending_category as $item)
            <div class="col-md-3">
                <a href="{{ url('view_category/'.$item->slug) }}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/category/'.$item->image) }}" alt="image">
                    <div class="card-body">
                        <h4>{{ $item->name }}</h4>
                        <p>{{ $item->description}}</p>
                    </div>
                </div>
            </a>
                </div> 
            
            @endforeach
        
        </div>
    </div>
</div>
@endsection

