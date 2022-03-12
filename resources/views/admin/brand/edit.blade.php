@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<style>

input, textarea {

color: black !important;

.form-control{
  margin: .4rem 0; 
  border: 2px solid rgb(57, 163, 202);"
}

}
</style>
<h4>Edit brand</h4>
        
            <div class="card-body">
        <form style="display: inline-block;" style="display: inline-block; padding-left: 60px;padding-right: 60px;width:500px !important;" action="{{ url('update-brand/') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
                    <label for=""><b>name</b></label>
                    <input style="display: block;"  value="{{ $brands->name }}" type="text" class="form-control" name="name" required>

                    <label for="">slug</label>
                    <input type="text" value="{{ $brands->slug}}" class="form-control" name="slug" required>
 
                    <label for="">status</label>
                    <input type="checkbox" {{$brands->status=="1"? 'checked':''}} name="status">

                    @if ($brands->image)
                        <img src="{{asset('assets/uploads/brands/'.$brands->image)}}" alt="image required">
                    @endif
                    <input type="file" class="form-control" name="image" >

                    <button type="submit" class="btn btn-primary">update brand</button>

        </form>
    </div>
@endsection