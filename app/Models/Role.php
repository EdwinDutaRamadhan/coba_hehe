<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'role_id';
    
    protected $table = 'alfamidi.role';

    protected $guarded  = ['role_id'];


    protected $with = ['parent','child'];
    
    //Scope
    public function scopeWithFeature($q)
    {
        return $q->with(['feature' => function($q){
            $q->allIn();
        }]);
    }
    // public function scopeFeature($q){
    //     return $q->with('featureChild');
    // }

        
    public function scopeActive($q)
    {
        return $q->where('iud_status','i');
    }

    
    //ELOQUENT RELATIONSHIP
    public function feature():BelongsToMany
    {
        return $this->belongsToMany(Feature::class,'alfamidi.role_access','role_id','feature_id')
        ->active();
    }
    public function parent():BelongsToMany
    {
        return $this->belongsToMany(Feature::class,'alfamidi.role_access','role_id','feature_id')
        ->where('parent_id',null)
        ->orderBy('order_number')
        ->active();
    }
    public function child():BelongsToMany
    {
        return $this->belongsToMany(Feature::class,'alfamidi.role_access','role_id','feature_id')
        ->whereNotNull('parent_id')
        ->active();
    }


    // public function getAllCategoriesAttribute() {
    //     $result = collect();
    //     $children = function($categories) use(&$result, &$children) {
    //         if($categories) return;
    //         $result = $result->merge($categories);
    //         $children($categories->pluck('children')->collapse());
    //     };
    //     $children($this->categories);
    //     return $result;
    // }
    
}
