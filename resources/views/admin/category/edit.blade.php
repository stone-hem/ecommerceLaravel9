@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<style>

input, textarea {

color: black !important;

}
</style>
<h4>edit category</h4>
        
            <div class="card-body">
        <form style="display: inline-block; padding-left: 30px;padding-right: 30px;width:500px !important;" action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
                    <label for=""><b>name</b></label>
                    <input  type="text"  style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);"  value="{{$category->name}}" class="form-control" name="name" >

                    <label for="">slug</label>
                    <input type="text" style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" value="{{$category->slug}}" class="form-control" name="slug" >
                    <label for="">description</label>
                    <textarea name="description"  style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" rows="4" class="form-control">{{$category->description}}</textarea>
 
                    <label for="">status</label>
                    <input type="checkbox"  {{$category->status=="1"? 'checked':''}} name="status">

                    <label for="">popular</label>
                    <input type="checkbox" {{$category->popular=="1"? 'checked':''}} name="popular">
                    <br>

                    @if ($category->image)
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="image required">
                    @endif
                    <input type="file" class="form-control" name="image">

                    <button type="submit" class="btn btn-primary">update product</button>

        </form>
    </div>
@endsection