<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'price' , 'description' , 'rating' , 'stock', 'image' , 'category_id'];


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function comment(){
        return $this->hasMany(Comment::class);
    }


}
