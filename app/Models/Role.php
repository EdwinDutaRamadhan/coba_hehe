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
    
    protected $table = 'role';

    protected $guarded  = ['role_id'];


    // protected $with = ['feature'];
    
    //Scope
    public function scopeWithFeature($q)
    {
        return $q->with(['feature' => function($q){
            $q->allIn();
        }]);
    }

    public function scopeActive($q)
    {
        return $q->where('iud_status','i');
    }
    
    //ELOQUENT RELATIONSHIP
    public function feature():BelongsToMany
    {
        return $this->belongsToMany(Feature::class,'role_access','role_id','feature_id')->active();
    }

    
}
