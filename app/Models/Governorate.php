<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Governorate extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function orphans(){
        return $this->hasMany(Orphan::class,'governorate_id');
    }


    public function districts(){
        return $this->hasMany(District::class);
    }


    public function city(){
        return $this->belongsTo(City::class,);
    }

}

