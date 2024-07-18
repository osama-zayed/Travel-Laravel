<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
             $table->string('reservation_code')->unique();
             $table->unsignedBigInteger('user_id');
             $table->foreign('user_id')->references('id')->on('users');
              $table->foreignId('flight_id')->constrained('flights')->onDelete('cascade');//(معرف الرحلة)
              $table->dateTime('reservation_date');//(تاريخ الحجز)
              $table->integer('pass_num');//عدد المسافرين
              $table->string('seat_class');//درجة المقعد
             $table->string('status');// (الحالة)
             // $table->enum('status', ['confirmed', 'cancelled', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
