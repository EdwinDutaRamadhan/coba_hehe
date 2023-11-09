<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'role_id';
    
    protected $table = 'admin_role';

    protected $guarded  = ['role_id'];

    protected $casts = ['access'=> 'array'];


    
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
    public function admins(){
        return $this->hasMany(Admin::class, 'role_id');
    }
}
