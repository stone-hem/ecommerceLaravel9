@extends('layouts.front')

@section("title")
welcome to the categories
@endsection

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<div class="py-5">
    <div class="container">
        <div class="row">
            <h3>categories</h3>
            <div class="col-md-12">
                @foreach ($category as $item)
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
</div>
@endsection

