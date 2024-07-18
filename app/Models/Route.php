<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
    'departure_airport_id',
    'arrival_airport_id',
    'distance',
    'duration'
    ];

    public function departureAirport()
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }


    public function arrivalAirport()
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }


    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}

/*
                         : الشرح
Route هو نموذج يمثل المسارات.
protected $fillable = ['origin_airport_id', 'destination_airport_id']; يحدد الأعمدة القابلة للملء.
departureAirport تُعَرِّف علاقة (عديد إلى واحد) مع المطار الأصلي.
arrivalAirport تُعَرِّف علاقة (عديد إلى واحد) مع المطار الوجهة.
flights تُعَرِّف علاقة (واحد إلى العديد) مع الرحلات الجوية.
*/
