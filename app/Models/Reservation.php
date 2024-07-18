<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_code',
        'user_id',
        'flight_id',
        'reservation_date',
        'pass_num',
        'seat_class',
        'status',


    ];


  public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }


    public function passengers()
    {
        return $this->belongsToMany(Passenger::class, 'reservation_passenger');
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}


/*
                         : الشرح
Reservation هو نموذج يمثل الحجوزات.
protected $fillable = ['user_id', 'flight_id', 'reservation_date', 'status']; يحدد الأعمدة القابلة للملء.
user تُعَرِّف علاقة (عديد إلى واحد) مع المستخدم.
flight تُعَرِّف علاقة (عديد إلى واحد) مع الرحلة.
passengers تُعَرِّف علاقة (واحد إلى العديد) مع المسافرين.
tickets تُعَرِّف علاقة (واحد إلى العديد) مع التذاكر.
payments تُعَرِّف علاقة (واحد إلى العديد) مع الدفعات.
*/
