<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::all();//calling the products model
        return view('admin.brand.index',compact('brands'));
    }
    public function add()
    {
        $category=Category::all();
        return view('admin.brand.add',compact('category'));
    }
    public function insert (Request $request)
    {
        $brands= new Brand();
        if($request->hasFile('image')){ //if the user has a file then do...
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext; //creating a unique filename
            $file->move('assets/uploads/category',$filename);//move the file to the server by creating its path
            $brands->image=$filename;//storing the file name
        }
        //for the remaining fields
       

        $brands->name=$request->input('name'); 
        $brands->category_id=$request->input('category_id'); 
        $brands->slug=$request->input('slug');
        $brands->status=$request->input('status')==TRUE?'1':'0';//using ternary operator
        $brands->save();//save the data
        return redirect('/dashboard')->with('status','brand added successfull');//redirect to dashboard with some message
    }
    //take us to the brand editing page
    public function edit($id){
        $brands = Brand::find($id); //find the id to be edited
        return view('admin.brand.edit',compact('brands'));
    }
    public function update(Request $request,$id)
    {
        $brands = Brand::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/brands/'.$brands->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext; //creating a unique filename
            $file->move('assets/uploads/category',$filename);//move the file to the server by creating its path
            $brands->image=$filename;//storing the file name
        }
        $brands->name=$request->input('name'); 
        $brands->slug=$request->input('slug');
        $brands->status=$request->input('status')==TRUE?'1':'0';//using ternary operator
        $brands->update();
        return redirect('/dashboard')->with('status','updated successfully');
    }
    public function delete($id)
    {
        $brands = Brand::find($id);
        if($brands->image){
            $path='assets/uploads/brands/'.$brands->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $brands->delete();
        return redirect('brands')->with('status','deleted successfully');
    }

}
