<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Orphan extends Model
{
    use HasFactory;
//    protected $fillable = ['personanName', 'dad', 'grandfather', 'family', 'city', 'birthdate', 'telephone', 'mobile'];
protected $guarded=[];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function governorate(){
        return $this->belongsTo(Governorate::class,'governorate_id');
    }


    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
}
