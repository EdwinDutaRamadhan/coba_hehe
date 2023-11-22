<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory;

    protected $primaryKey = 'store_id';
    
    protected $table = 'alfamidi.store';

    protected $guarded = ['store_id'];

    protected $with = ['location','plastic_product'];

    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function plastic_product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'plastic_product_id');
    }

    public function stock(){
        return $this->hasMany(Stock::class, 'store_id');
    }
}
