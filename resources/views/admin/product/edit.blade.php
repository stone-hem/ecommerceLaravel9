@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<style>

input, textarea {

color: black !important;

}
.form-control{
  margin: .4rem 0; 
  border: 2px solid rgb(57, 163, 202);"
}
</style>
<h4>edit product</h4>
        
            <div class="card-body">
        <form style="display: inline-block; padding-left: 30px;padding-right: 30px;width:500px !important;" action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="col-md-12">
                <select class="form-select" name="cate_id">
                    <option value="">{{ $products->category->name }}</option>
                   
                  </select>
            </div>

                    <label for=""><b>name</b></label>
                    <input style="display: block;" value="{{ $products->name }}" type="text" class="form-control" name="name">

                    <label for="">slug</label>
                    <input type="text" value="{{ $products->slug }}" class="form-control" name="slug">

                    <label for="">small_description</label>
                    <textarea name="small_description" rows="2" class="form-control">{{ $products->small_description }}</textarea>

                    <label for="">description</label>
                    <textarea name="description" rows="4" class="form-control">value="{{ $products->description }}</textarea>

                    <label for=""><b>orignal price</b></label>
                    <input style="display: block;" value="{{ $products->orignal_price }}" type="number" class="form-control" name="orignal_price">

                    <label for=""><b>selling price</b></label>
                    <input style="display: block;" value="{{ $products->selling_price }}" type="number" class="form-control" name="selling_price">
                    
                    <label for=""><b>Quantity</b></label>
                    <input style="display: block;" value="{{ $products->quantity }}" type="number" class="form-control" name="quantity">

                    <label for=""><b>tax</b></label>
                    <input style="display: block;" value="{{ $products->tax }}" type="number" class="form-control" name="tax">

                    <label for="">status</label>
                    <input type="checkbox" {{$products->status=="1"? 'checked':''}} name="status">

                    <label for="">trending</label>
                    <input type="checkbox" {{$products->trending=="1"? 'checked':''}} name="trending">
                    <br>
                    <label for="">meta title</label>
                    <input type="text" value="{{ $products->meta_title }}" class="form-control" name="meta_title">
                    <label for="">meta keywords</label>
                    <textarea name="meta_keywords" rows="4" class="form-control"> {{ $products->meta_keywords }}</textarea>
                    <label for="">meta description</label>
                    <textarea name="meta_description" rows="4" class="form-control"> {{ $products->meta_description }}</textarea>

                    @if ($products->image)
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="image required">
                    @endif

                    <input type="file" class="form-control" name="image">

                    <button type="submit" class="btn btn-primary">update product</button>

        </form>
    </div>
@endsection