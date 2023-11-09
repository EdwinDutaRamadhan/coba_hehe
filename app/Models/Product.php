<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'product_id';
    
    protected $table = 'product';

    protected $guarded = ['product_id'];

    //EAGER LOADING
    protected $with = ['category','brand','preorder'];

    //protected $withCount = [];

    //ELOQUENT RELATIONSHIP
    public function category(){
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function preorder(){
        return $this->belongsTo(PreorderCategory::class, 'preorder_category_id');
    }
    
    //SCOPE
    public function scopeActive($query) //Active Item
    {
        return $query->where('iud_status','i');
    }
    public function scopeInactive($query) //Inactive Item
    {
        return $query->where('iud_status','d');
    }

}
