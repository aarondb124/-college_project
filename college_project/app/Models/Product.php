<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded =['id'];
     
    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subSubcategory(){
        return $this->belongsTo(Subsubcategory::class);
    }
    public function inventory(){
        return $this->hasOne(Inventory::class);
    }
    public function features(){
        return $this->hasMany(ProductFeature::class);
    }
    public function features_4(){
        return $this->hasMany(ProductFeature::class)->take(4);
    }
    
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

   
    
}
