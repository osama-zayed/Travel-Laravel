<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingPas extends Model
{
    use HasFactory;

  /*  protected $fillable = [
        'ticket_id',
        'passenger_id',
        'boarding_time',
        'gate'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }*/
}
/*
                         : الشرح
BoardingPass هو نموذج يمثل بطاقات الصعود.
protected $fillable = ['ticket_id', 'passenger_id', 'boarding_time', 'gate']; يحدد الأعمدة القابلة للملء.
ticket تُعَرِّف علاقة (عديد إلى واحد) مع التذكرة.
passenger تُعَرِّف علاقة (عديد إلى واحد) مع المسافر.
*/
