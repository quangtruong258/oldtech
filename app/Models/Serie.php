<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $table = 'series';
    protected $fillable = [
      
        'ten',
        'slug',
    ]; 

    
    public function product(){
        return $this->hasMany(Product::class,'serie_id','id');
    }
    
}
