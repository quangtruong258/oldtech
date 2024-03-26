<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
      
        'ten',
        'slug',
    ]; 

    public function products(){
        return $this->hasMany(Product::class,'cate_id','id');
    }

    public function typeproducts(){
        return $this->hasMany(ProductType::class,'category_id','id');
    }
    
}
