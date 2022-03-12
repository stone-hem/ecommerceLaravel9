<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();//calling the products model
        return view('admin.product.index',compact('products'));
    }
    public function add()
    {
        $category=Category::all();
        return view('admin.product.add',compact('category'));
    }
    public function insert(Request $request)
    {
        $products=new Product();//creating an object
        if($request->hasFile('image')){ //if the user has a file then do...
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext; //creating a unique filename
            $file->move('assets/uploads/products',$filename);//move the file to the server by creating its path
            $products->image=$filename;//storing the file name
        }
        $products->cate_id=$request->input('cate_id'); 
        $products->name=$request->input('name'); 
        $products->slug=$request->input('slug'); 
        $products->small_description=$request->input('small_description'); 
        $products->description=$request->input('description'); 
        $products->orignal_price=$request->input('orignal_price'); 
        $products->selling_price=$request->input('selling_price'); 
        $products->quantity=$request->input('quantity'); 
        $products->tax=$request->input('tax'); 
        $products->status=$request->input('status')==TRUE?'1':'0';//using ternary operator
        $products->trending=$request->input('trending')==TRUE?'1':'0';
        $products->meta_title=$request->input('meta_title'); 
        $products->meta_description=$request->input('meta_description'); 
        $products->meta_keywords=$request->input('meta_keywords'); 
        $products->save();//save the data
        return redirect('products')->with('status','product added successfull');//redirect to dashboard with some message
    }
    public function edit($id)
    {
        $products=Product::find($id);//finding the id, fetching the data
        return view('admin.product.edit',compact('products'));
    }
    public function update(Request $request, $id)
    {
        $products=Product::find($id);
        if($request->hasFile('image')){ //if the user has a file then do...
            $path='assets/uploads/products/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext; //creating a unique filename
            $file->move('assets/uploads/products',$filename);//move the file to the server by creating its path
            $products->image=$filename;//storing the file name
        }
        //$products->cate_id=$request->input('cate_id'); 
        $products->name=$request->input('name'); 
        $products->slug=$request->input('slug'); 
        $products->small_description=$request->input('small_description'); 
        $products->description=$request->input('description'); 
        $products->orignal_price=$request->input('orignal_price'); 
        $products->selling_price=$request->input('selling_price'); 
        $products->quantity=$request->input('quantity'); 
        $products->tax=$request->input('tax'); 
        $products->status=$request->input('status')==TRUE?'1':'0';//using ternary operator
        $products->trending=$request->input('trending')==TRUE?'1':'0';
        $products->meta_title=$request->input('meta_title'); 
        $products->meta_description=$request->input('meta_description'); 
        $products->meta_keywords=$request->input('meta_keywords'); 
        $products->update();//update the data using update function
        return redirect('products')->with('status','product updated successfull');//redirect to  with some message
    }
    public function delete($id)
    {
        $products=Product::find($id);//always check for the id
        //check if the file exits first 
        $path='assets/uploads/products/'.$products->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $products->delete();//save the data
        return redirect('products')->with('status','product deleted successfull');//redirect to products with some message
    }
}
