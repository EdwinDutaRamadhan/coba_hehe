<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'merk_id';
    
    protected $table = 'merk';

    protected $guarded = ['merk_id'];

    
    
    //ELOQUENT RELATIONS
    protected $with = ['brand'];
    
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
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
