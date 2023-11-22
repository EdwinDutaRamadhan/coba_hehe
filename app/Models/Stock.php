<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasFactory;

    protected $primaryKey = 'stock_id';
    
    protected $table = 'alfamidi.stock';

    protected $guarded = ['stock_id'];

    protected $with = ['product'];

    //SCOPE
    public function scopeActive($query) //Active Item
    {
        return $query->where('iud_status','i');
    }
    public function scopeInactive($query) //Inactive Item
    {
        return $query->where('iud_status','d');
    }

    //ELOQUENT RELATIONSHIP

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
