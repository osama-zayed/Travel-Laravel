<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

     protected  $fillable=[
        'name',
        'model',
        'airline',
        'first_class',
        'business_class',
        'economy_class',
        'type',
        'status',


    ];


    public function flights()
    {
        return $this->hasMany(Flight::class);

    }

}

/*

                         : الشرح
Plane هو نموذج يمثل الطائرات.
protected $fillable = ['model', 'capacity', 'airline_id']; يحدد الأعمدة القابلة للملء.
airline تُعَرِّف علاقة (عديد إلى واحد) مع شركات الطيران.
flights تُعَرِّف علاقة (واحد إلى العديد) مع الرحلات الجوية.

*/

