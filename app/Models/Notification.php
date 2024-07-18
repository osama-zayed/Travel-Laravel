<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /* protected $fillable = [
          'user_id',
          'message',
          'sent_date',
          'status'];

   public function user()
    {
        return $this->belongsTo(User::class);
    }*/

}

/*
                         : الشرح
Notification هو نموذج يمثل الإشعارات.
protected $fillable = ['user_id', 'message', 'sent_date', 'status']; يحدد الأعمدة القابلة للملء.
user تُعَرِّف علاقة (عديد إلى واحد) مع المستخدم.
*/
