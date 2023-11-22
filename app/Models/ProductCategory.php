<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'category_id';
    
    protected $table = 'alfamidi.product_category';

    protected $guarded = ['category_id'];

    

    //SCOPE
    public function scopeActive($query) //Active Item
    {
        return $query->where('iud_status','i');
    }
    public function scopeInactive($query) //Inactive Item
    {
        return $query->where('iud_status','d');
    }

    //ELOQUENT RELATION
    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
