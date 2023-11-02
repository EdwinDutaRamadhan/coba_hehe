<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'role_id';
    
    protected $table = 'role';

    protected $guraded = ['role_id'];

    public function admins(){
        return $this->hasMany(Admin::class, 'role_id');
    }
}
