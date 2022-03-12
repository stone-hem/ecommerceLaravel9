@extends('layouts.admin')

@section("main-content position-relative max-height-vh-100 h-100 border-radius-lg")
<div class="card">
    <div class="card-header">
        <h3 style="text-align:center">sub-category page</h3>
        
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
                
                {{-- @foreach($subcategory as $item) --}}
                {{-- @if($category->Parent_id == $category->id) --}}
                <tr>
                 <td>{{$subcategory->id}}</td>
                 <td>{{$subcategory->name}}</td>
                 <td>{{$subcategory->description}}</td>
                 <td>
                 <img src="{{asset('assets/uploads/category/'.$subcategory->image)}}" class="w-25" alt="image to be uploaded">
                 </td>
                 <td>
                   <button class="btn btn-primary"> <a href="{{url('edit-category/'.$subcategory->id)}}">edit</a></button>
                    <button class="btn btn-danger"> <a href="{{url('delete-category/'.$subcategory->id)}}">Delete</a></button>
                 </td>
                 </tr>
                 {{-- @endif --}}
                 {{-- @endforeach --}}
        
            </tbody>
        </table>
        
    </div>
</div>
@endsection