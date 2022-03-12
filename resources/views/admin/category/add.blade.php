@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<style>

input, textarea {

color: black !important;


}


</style>
<h4>Add category</h4>
        
            <div class="card-body">
                @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
        <form style="display: inline-block; padding-left: 60px;padding-right: 60px;width:500px !important;"   action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                    <label for=""><b>name</b></label>
                    <input style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" type="text" class="form-control" name="name" >

                    <label for="">slug</label>
                    <input type="text" style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);"  class="form-control" name="slug" required>
                    <label for="">description</label>
                    <textarea name="description" style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" rows="4" class="form-control">put your description here</textarea>
 
                    <label for="">status</label>
                    <input type="checkbox"  name="status">

                    <label for="">popular</label>
                    <input type="checkbox"  name="popular">
                    <br>
                    <label for="">meta title</label>
                    <input type="text" style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" class="form-control" name="meta_title" required>
                    <label for="">meta keywords</label>
                    <textarea name="meta_keywords"  style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);" rows="4" class="form-control"> put yourmeta keywords here</textarea>
                    <label for="">meta description</label>
                    <textarea name="meta_description"  style="margin: .4rem 0; border: 2px solid rgb(57, 163, 202);"  rows="4" class="form-control"> put your meta description here</textarea>

                    <input type="file" class="form-control" name="image" required>

                    <button type="submit" class="btn btn-primary">create category</button>

        </form>

    </div>
   

@endsection