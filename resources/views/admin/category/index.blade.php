@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<div class="card">
    <div class="card-header">
        <h3 style="text-align:center">category page</h3>
        
    </div>
    <div class="card-body">
        <table class="table">
        <thead>
            <tr>
                <th>id</th>
                 <th>name</th>
                 <th>description</th>
                  <th>image</th>
                 <th>action</th>
         </tr>
        </thead>
            <tbody>
                @foreach($category as $item)
                <tr>
                 <td>{{$item->id}}</td>
                 <td> {{$item->name}}</td>
                 <td>{{$item->description}}</td>
                 <td>
                 <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="w-25" alt="image to be uploaded">
                 </td>
                 <td>
                   <button class="btn btn-primary"> <a href="{{url('edit-category/'.$item->id)}}">edit</a></button>
                    <button class="btn btn-danger"> <a href="{{url('delete-category/'.$item->id)}}">Delete</a></button>
                 </td>
                 <td>
                    <button class="btn btn-light"> <a href="{{url('sub/'.$item->id)}}">view sub-categories</a></button>
                  </td>
                 </tr>
             
                 @endforeach
        
            </tbody>
        </table>
        
    </div>
</div>
@endsection