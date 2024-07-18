<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

     protected $fillable = [
          'reservation_id',
          'amount',
          'payment_date',
          'payment_method',
          'status'];

   public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
/*
                         : الشرح
Payment هو نموذج يمثل الدفعات.
protected $fillable = ['reservation_id', 'amount', 'payment_date', 'payment_method', 'status']; يحدد الأعمدة القابلة للملء.
reservation تُعَرِّف علاقة (عديد إلى واحد) مع الحجز.
*/







