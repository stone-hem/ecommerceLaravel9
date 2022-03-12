@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<div class="card">
    <div class="card-header">
        <h3 style="text-align:center">Brands page</h3>
        
    </div>
    <div class="card-body">
        <table class="table">
        <thead>
            <tr>
                <th>id</th>
                 <th>name</th>
                 <th>category</th>
                  <th>image</th>
                 <th>action</th>
         </tr>
        </thead>
            <tbody>
                @foreach($brands as $item)
                <tr>
                 <td>{{$item->id}}</td>
                 <td>{{$item->name}}</td>
                 <td>{{$item->category['name']}}</td>
                 <td>
                 <img src="{{asset('assets/uploads/brands/'.$item->image)}}" class="w-25" alt="image to be uploaded">
                 </td>
                 <td>
                   <button class="btn btn-primary"> <a href="{{url('edit-brand/'.$item->id)}}">edit</a></button>
                    <button class="btn btn-danger"> <a href="{{url('delete-brand/'.$item->id)}}">Delete</a></button>
                 </td>
                 </tr>
                 @endforeach
        
            </tbody>
        </table>
        
    </div>
</div>
@endsection