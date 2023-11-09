<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreorderCategory extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'preorder_category_id';
    
    protected $table = 'preorder_category';

    protected $guarded = ['preorder_category_id'];

    //SCOPE
    public function scopeActive($query) //Active Item
    {
        return $query->where('iud_status','i');
    }
    public function scopeInactive($query) //Inactive Item
    {
        return $query->where('iud_status','d');
    }

    //ELOQUENT RELATIONS
    public function products(){
        return $this->hasMany(Product::class,'preorder_category_id');
    }
}
