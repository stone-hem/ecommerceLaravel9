@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<style>

input, textarea {

color: black !important;

}
</style>
<h4>Add product</h4>
        
            <div class="card-body">
        <form style="display: inline-block; padding-left: 60px;padding-right: 60px;width:500px !important;" action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-12">
                <select class="form-select" name="cate_id">
                    <option value="">select category</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                   
                  </select>
            </div>

                    <label for=""><b>name</b></label>
                    <input style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" type="text" class="form-control" name="name" required>

                    <label for="">slug</label>
                    <input type="text" style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);"  class="form-control" name="slug" required>

                    <label for="">small_description</label>
                    <textarea name="small_description"  style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" rows="2" class="form-control">put your description here</textarea>

                    <label for="">description</label>
                    <textarea name="description"   style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" rows="4" class="form-control">put your description here</textarea>

                    <label for=""><b>orignal price</b></label>
                    <input style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" type="number" class="form-control" name="orignal_price" required>

                    <label for=""><b>selling price</b></label>
                    <input style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" type="number" class="form-control" name="selling_price" required>
                    
                    <label for=""><b>Quantity</b></label>
                    <input style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" type="number" class="form-control" name="quantity" required>

                    <label for=""><b>tax</b></label>
                    <input style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" type="number" class="form-control" name="tax" required>

                    <label for="">status</label>
                    <input type="checkbox"  name="status">

                    <label for="">trending</label>
                    <input type="checkbox"  name="trending">
                    <br>
                    <label for="">meta title</label>
                    <input type="text" style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);"  class="form-control" name="meta_title" required>
                    <label for="">meta keywords</label>
                    <textarea name="meta_keywords"  style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" rows="4" class="form-control"> put yourmeta keywords here</textarea>
                    <label for="">meta description</label>
                    <textarea name="meta_description"  style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" rows="4" class="form-control"> put your meta description here</textarea>

                    <input type="file" class="form-control" name="image" required>

                    <button type="submit" class="btn btn-primary">create product</button>

        </form>
    </div>
@endsection