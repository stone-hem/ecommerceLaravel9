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
<h4>Add brand</h4>
        
            <div class="card-body">
        <form style="display: inline-block; padding-left: 60px;padding-right: 60px;width:500px !important;" action="{{ url('insert-brand') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                    <div class="col-md-12">
                        <select class="form-select" name="category_id" >
                            <option value="">select category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        
                        </select>
                    </div>
                    <label for=""><b>name</b></label>
                    <input style="display: block;" type="text" class="form-control" name="name" required>

                    <label for="">slug</label>
                    <input type="text" class="form-control" name="slug" required>
 
                    <label for="">status</label>
                    <input type="checkbox"  name="status">

                    <input type="file" class="form-control" name="image" required>

                    <button type="submit" class="btn btn-primary">create brand</button>

        </form>
    </div>
 
@endsection