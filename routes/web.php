<?php

use Illuminate\Support\Facades\Auth;
//all controllers in use must be imported here
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//userfront routes

Route::get('/',[FrontendController::class,'index']);

Route::get('category',[FrontendController::class,'category']);

Route::get('view_category/{slug}',[FrontendController::class,'view_category']);

Route::get('category/{categoryslug}/{productslug}',[FrontendController::class,'productview']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['auth','isAdmin'])->group(function(){
//     Route::get('/dashboard', function () {
//         return view('admin.index');
//      });

// });

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard','Admin\FrontendController@index');
    //category routes
    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'delete']);
   //prducts routes
    Route::get('products',[ProductController::class,'index']);
    Route::get('add-products',[ProductController::class,'add']);
    Route::post('insert-product',[ProductController::class,'insert']);

    Route::get('edit-product/{id}',[ProductController::class,'edit']);

    Route::put('update-product/{id}',[ProductController::class,'update']);

    Route::get('delete-product/{id}',[ProductController::class,'delete']);//the delete method could be used instead of get method

    //brand routes
    Route::get('brands',[BrandController::class,'index']);
    Route::get('add-brands',[BrandController::class,'add']);
    Route::post('insert-brand',[BrandController::class,'insert']);
    
    Route::get('edit-brand/{id}',[BrandController::class,'edit']);

    Route::put('update-brand/{id}',[BrandController::class,'update']);

    Route::get('delete-brand/{id}',[BrandController::class,'delete']);//the delete method could be used instead of get method
    
    //subcategories routes

    Route::get('subcategories', [SubcategoryController::class,'add']);
    Route::post('add-subcategory',[SubcategoryController::class,'insert']);
    Route::get('sub',[SubcategoryController::class,'index']);

});