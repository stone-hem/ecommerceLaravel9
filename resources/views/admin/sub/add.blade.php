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
<h4>Add a sub-category</h4>
        
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
        <form style="display: inline-block; padding-left: 30px;padding-right: 30px;width:500px !important;" action="{{ url('add-subcategory') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

                    <div class="col-md-12">
                        <select class="form-select" name="Parent_id" required>
                            <option value="">select category</option>
                            @foreach ($subcategory as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for=""><b>sub category name</b></label>
                    <input style="display: block;" type="text" class="form-control" name="name" required>

                    <label for="">slug</label>
                    <input type="text" class="form-control" name="slug" required>
                    <label for="">description</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
 
                    <label for="">status</label>
                    <input type="checkbox"  name="status">

                    <label for="">popular</label>
                    <input type="checkbox"  name="popular">
                    <br>

                    <input type="file" class="form-control" name="image" required>

                    <button type="submit" class="btn btn-primary">create sub category</button>

        </form>
    </div>
@endsection