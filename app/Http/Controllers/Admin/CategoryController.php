<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index(){
        $category=Category::where('Parent_id','0')->get();
        return view('admin.category.index',compact('category'));
        
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert (Request $request)
    {
        $this->validate(request(), [
            'name' => 'bail|alpha|required|min:5',
            'slug'=>'required',
            'description' => 'required',
            'image' => 'required',
        ]);




        $category= new Category();
        if($request->hasFile('image')){ //if the user has a file then do...
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext; //creating a unique filename
            $file->move('assets/uploads/category',$filename);//move the file to the server by creating its path
            $category->image=$filename;//storing the file name
        }
        //for the remaining fields


        $category->name=$request->input('name'); 
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE?'1':'0';//using ternary operator
        $category->popular=$request->input('popular')==TRUE?'1':'0';
        $category->save();//save the data
        return redirect('/dashboard')->with('status','category added successfull');//redirect to dashboard with some message
    }
    public function edit($id){
        $category = Category::find($id); //find the id to be edited
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'slug'=>'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        $category = Category::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext; //creating a unique filename
            $file->move('assets/uploads/category',$filename);//move the file to the server by creating its path
            $category->image=$filename;//storing the file name
        }
        $category->name=$request->input('name'); 
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==TRUE?'1':'0';//using ternary operator
        $category->popular=$request->input('popular')==TRUE?'1':'0';
        $category->update();
        return redirect('/dashboard')->with('status','updated successfully');

    }
    public function delete($id)
    {
        $category = Category::find($id);
        if($category->image){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $result=$category->delete();
        if ($result) {
            $product=Product::where('cate_id',$id);
            $product->delete();
        }
        return redirect('categories')->with('status','category deleted successfully plus all of it products');
    }
    
}
