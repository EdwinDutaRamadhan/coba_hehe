<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'feature_id';
    
    protected $table = 'feature';

    protected $guarded  = ['feature_id'];

    // protected $with = ['parent'];

    //Scope

    public function scopeActive($q){
        return $q->where('iud_status','i');
    }
    
    public function scopeMainSidebar($q){
        return $q->where('parent_id',null)->orderBy('order_number');
    }

    public function scopeAllIn($q){
        return $q->mainSidebar()->with('children')->get();
    }

    public function parent()
    {
        return $this->belongsTo(Feature::class,'parent_id')->where('parent_id',null)->active();
    }
    public function children()
    {
        return $this->hasMany(Feature::class,'parent_id')->active()->orderBy('feature_id');
    }
}
