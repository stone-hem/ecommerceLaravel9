<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index()
    {
        $featured_products=Product::where('trending','0')->take(5)->get();
        $trending_category=Category::where('popular','1')->take(5)->get();
        return view('userfront.index',compact('featured_products','trending_category'));
    }
    public function category()
    {
        $category=Category::where('status','1')->get();
        return view('userfront.category',compact('category'));
    }
    public function view_category($slug)
    {
        if(Category::where('slug',$slug)->exists()){
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->where('status','1')->get();
            return view('userfront.products.index',compact('category','products'));  
        }
        else{
            return redirect('/')->with('status','category does not exist');
        }
        
    }
    public function productview($categoryslug,$productslug)
    {
        if(Category::where('slug',$categoryslug)->exists()){
            if(Product::where('slug',$productslug)->exists()){
                $products=Product::where('slug',$productslug)->first();
                return view('userfront.products.view',compact('products'));
            }
            else{
                return redirect('/')->with('status','product does not exist');
            }

        }
        else{
            return redirect('/')->with('status','category does not exist');
        }
    }
}
