<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
      
        'ten',
        'slug',
        'mota',
        'serie_id',
      
        'type_id',
        'brand_id',
        'cate_id',
        'image',
        'status',
        'price'

    ]; 
    //quan he 1 - 1
    public function category(){
        return $this->hasOne(Category::class,'id', 'cate_id');
    }

    public function serie(){
        return $this->hasOne(Serie::class,'id','serie_id');
    }
    
    public function type(){
        return $this->hasOne(ProductType::class,'id','type_id',);
    }

    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    //quan he 1 - n

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }

     //quan he nhieu nhieu (many to many)
     public function color()
     {
         return $this->belongstoMany(Color::class);
     }    
}
