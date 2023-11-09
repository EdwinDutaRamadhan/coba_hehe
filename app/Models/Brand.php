<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'brand_id';
    
    protected $table = 'brand';

    protected $guarded = ['brand_id'];

    //ELOQUENT RELATIONS

    // protected $with = ['products','merks'];//tidak digunakan sementara
    
    public function products(){
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function merks(){
        return $this->hasMany(Merk::class, 'brand_id');
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
