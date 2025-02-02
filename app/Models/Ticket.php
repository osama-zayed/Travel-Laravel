<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'seat_number',
        'class',
        'price',
        'status',

    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
