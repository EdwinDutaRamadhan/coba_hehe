<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'location_id';
    
    protected $table = 'alfamidi.location';

    protected $guarded = ['location_id'];
}
