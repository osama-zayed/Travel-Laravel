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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');// (رقم الرحلة)
            $table->string('airline');
            $table->foreignId('plane_id')->constrained('planes')->onDelete('cascade');//(معرف الطائرة)
            $table->foreignId('route_id')->constrained('routes')->onDelete('cascade');// (معرف الخط الجوي)
            $table->string('day');
            $table->date('date');
            $table->Time('departure_time');//(وقت المغادرة)
            $table->Time('arrival_time');//(وقت الوصول)
           // $table->integer("price");
           $table->enum('status', ['scheduled', 'delayed', 'cancelled']);// (الحالة)
            $table->timestamps();

            $table->unique(['flight_number','date']); //هذا سويت القيد حق عدم تكرار الرحله بنفس التاريخ

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
 // $table->integer('departure_airport_id');
           // $table->integer('arrival_airport_id');
           // $table->integer("seats");
           // $table->integer("remain_seats");
            //departure_gate (بوابة المغادرة)
            // departure_airport_id --> يشير إلى Airport(id)
           // arrival_airport_id   --> يشير إلى Airport(id)

