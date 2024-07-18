<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'email',
        'phone',
        'address',
        'nationality',
        'passport_number',
        'passport_date',
        'passport_image',

    ];


    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_passenger');
    }

 /*   public function boardingPasses()
    {
        return $this->hasMany(BoardingPass::class);
    }
    */
}


/*
                         : الشرح
Passenger هو نموذج يمثل المسافرين.
protected $fillable = ['reservation_id', 'name', 'passport_number'........]; يحدد الأعمدة القابلة للملء.
reservation تُعَرِّف علاقة (عديد إلى واحد) مع الحجز.
*/
