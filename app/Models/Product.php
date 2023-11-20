<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'product_id';
    
    protected $table = 'product';

    protected $guarded = ['product_id'];

    //EAGER LOADING
    protected $with = ['category','brand','preorder','tags'];

    //protected $withCount = [];

    //ELOQUENT RELATIONSHIP
    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function preorder():BelongsTo
    {
        return $this->belongsTo(PreorderCategory::class, 'preorder_category_id');
    }
    
    public function tags():HasMany
    {
        return $this->hasMany(TagPlu::class, 'plu','plu');
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
