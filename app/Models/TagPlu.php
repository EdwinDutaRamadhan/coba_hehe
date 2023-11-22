<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagPlu extends Model
{
    use HasFactory;

    //MODEL CONFIG
    protected $primaryKey = 'tag_plu_id';
    
    protected $table = 'alfamidi.tag_plu';

    protected $guarded  = ['tag_plu_id'];

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
