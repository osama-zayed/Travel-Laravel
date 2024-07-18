<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

 protected $fillable = [
    'flight_number',
    'airline',
    'plane_id',
    'route_id',
    'day',
    'date',
    'departure_time',
    'arrival_time',
    'price',
    'status',


];


    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }


    public function route()
    {
        return $this->belongsTo(Route::class);
    }


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

/*
                         : الشرح
 Flight هو نموذج يمثل الرحلات.
protected $fillable = ['flight_number', 'departure_time', 'arrival_time', 'plane_id', 'route_id', 'airline_id']; يحدد الأعمدة القابلة للملء.
plane تُعَرِّف علاقة (عديد إلى واحد) مع الطائرة.
route تُعَرِّف علاقة (عديد إلى واحد) مع المسار.
reservations تُعَرِّف علاقة (واحد إلى العديد) مع الحجوزات.
*/
