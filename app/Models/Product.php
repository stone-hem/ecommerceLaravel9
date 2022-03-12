<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';//specifying the table name
    protected $fillable=[
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'orignal_price',
        'selling_price',
        'image',
        'quantity',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    //creating a has many relationship
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');//match the cate_id with the id of category
    }
}


