<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'city',
    'country',
    'code'
];


    public function departureRoutes ()
    {
        return $this->hasMany(Route::class, 'departure_airport_id');
    }


    public function arrivalRoutes()
    {
        return $this->hasMany(Route::class, 'arrival_airport_id');
    }
}

/*
                         : الشرح
Airport هو نموذج يمثل المطارات.
protected $fillable = ['name', 'city', 'country']; يحدد الأعمدة القابلة للتعبية.
departureRoutes تُعَرِّف علاقة (واحد إلى العديد) مع المسارات التي تكون فيها المطار هو المطار الأصلي.
arrivalRoutes تُعَرِّف علاقة (واحد إلى العديد) مع المسارات التي تكون فيها المطار هو المطار الوجهة.
*/
