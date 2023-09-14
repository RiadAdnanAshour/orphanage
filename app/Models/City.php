<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'Namecity',
        'governorate_id', // يجب تضمين هذا الحقل هنا
    ];

    public function orphans(){
        return $this->hasMany(Orphan::class,'city_id');
    }

    public function governorates(){
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }


}
