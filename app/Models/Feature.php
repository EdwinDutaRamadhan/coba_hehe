<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'feature_id';
    
    protected $table = 'alfamidi.feature';

    protected $guarded  = ['feature_id'];

    // protected $with = ['children'];

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
    
    public function scopeCoba($q){
        return $q->with('parent')->get();
    }

    // public function scopeChildren($q){
    //     ret
    // }
    // public function scopeParentChildren($q,$param){
    //     return $q->mainSidebar()->where('feature_id',$param)->with('children')->get();
    // }

    // public function scopeChildOnly($q,$param){
    //     return $q->where('parent_id',$param)->get();
    // }

    // public function scopeChildAll($q){
    //     return $q->whereNotNull('parent_id')->orderBy('feature_id');
    // }

    // public function scopeParent($q){
    //     return $q->with('parent');
    // }
    // public function scopeChild($q){
    //     return $q->where('parent_id',null)->orderBy('order_number')->with(['children'=>fn($q)=>$q->whereNotNull('parent_id')]);
    // }

    public function parent()
    {
        return $this->belongsTo(Feature::class,'parent_id')->where('parent_id',null)->active();
    }
    public function children()
    {
        return $this->hasMany(Feature::class,'parent_id')->active();
    }

    public function role(){
        return $this->belongsToMany(Role::class,'alfamidi.role_access','feature_id','role_id');
    }

    

}
