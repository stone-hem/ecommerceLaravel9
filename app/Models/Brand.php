<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brands';//specifying the table name
    protected $fillable=[
        'name',
        'slug',
        'category_id',
        'status',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');//match the cate_id with the id of category
    }
}
