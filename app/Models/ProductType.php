<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'typeproducts';
    protected $fillable = [
      
        'ten',
        'slug',
    ]; 
    
    public function product(){
        return $this->hasMany(Product::class,'type_id','id');
    }
    

}
