<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable=[
        'Parent_id',
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
    ];
    public function subcategory()
    {
        return $this->hasMany(Category::class);
    }
    public function children() {
        return $this->hasMany('Category', 'Parent_id')->with('children');
    }
}
