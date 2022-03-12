<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; //the model in use must be imported

class SubcategoryController extends Controller
{

    public function add()//this function redirects us to the adding page
    {
        $subcategory=Category::all();
        return view('admin.sub.add',compact('subcategory'));//get all the reqiured data from the table and returning a view
    }
    public function insert (Request $request)//this function does the actual adding that is inserting
    {
        $this->validate(request(), [
            'Parent_id'=>'required',
            'name' => 'required',
            'slug'=>'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        $subcategory= new Category();//calling the model
        if($request->hasFile('image')){ //if the user has a file then do...
            $file=$request->file('image');//request for thr file if the user has it, the if  condition above
            $ext=$file->getClientOriginalExtension();//getting the pic orignal extension eg png or jpeg
            $filename=time().'.'.$ext; //creating a unique filename
            $file->move('assets/uploads/category',$filename);//move the file to the server by creating its path
            $subcategory->image=$filename;//storing the file name
        }
        //for the remaining fields
        $subcategory->Parent_id=$request->input('Parent_id'); 
        $subcategory->name=$request->input('name'); 
        $subcategory->slug=$request->input('slug');
        $subcategory->description=$request->input('description');
        $subcategory->status=$request->input('status')==TRUE?'1':'0';//using ternary operator
        $subcategory->popular=$request->input('popular')==TRUE?'1':'0';
        $subcategory->save();//save the data
        return redirect('/dashboard')->with('status','category added successfull');//redirect to dashboard with some message
    }
    public function showsub($id){
        $subcategory = Category::findOrFail($id);
        $id=$subcategory->id;
        
        // dd($subcategory);

        // return response()->json($category->id);
        return view('admin.sub.index',compact('subcategory'));
        
    }
}
