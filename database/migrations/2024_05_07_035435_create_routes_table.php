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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departure_airport_id');//(معرف مطار المغادرة)
            $table->unsignedBigInteger('arrival_airport_id');//(معرف مطار الوصول)
            $table->integer('distance');//المسافة
            $table->time('duration');//مدة الرحلة
            $table->foreign('departure_airport_id')->references('id')->on('airports');//يشير إلى Airport(id)
            $table->foreign('arrival_airport_id')->references('id')->on('airports');//يشير إلى Airport(id)
            $table->timestamps();

            //  إضافة العلاقات بين الجداول  تستخدم المفاتيح الخارجية
            // $table->foreignId('departure_airport_id')->references('id')->on('airports');//لمى اسوي هيك مايرضى

           /*
           //FOREIGN KEY (airline_id) REFERENCES Airline(id)ربطها بشركة الطيران
          airline_id: معرف شركة الطيران التي تدير هذا المسار (مرتبط بجدول Airline).
          (1, 1, 1, 2, 5456, '11:30:00'), -- LAX to LHR
           ******
 INSERT INTO Route (id, origin_airport_id, destination_airport_id, distance, duration) VALUES
(1, 1, 2, 5456, '11:30:00'), -- LAX to LHR
(2, 2, 3, 9560, '12:00:00'), -- LHR to HND
(3, 3, 4, 7910, '10:30:00'), -- HND to DXB
(4, 4, 5, 5245, '07:00:00'), -- DXB to CDG
(5, 5, 1, 9120, '11:45:00'); -- CDG to LAX

id: معرف فريد لكل مسار.
origin_airport_id: معرف المطار الذي تنطلق منه الرحلة (مرتبط بجدول Airport).
destination_airport_id: معرف المطار الذي تتجه إليه الرحلة (مرتبط بجدول Airport).
distance: المسافة بين المطارين بالكيلومترات.
duration: مدة الرحلة (ساعة:دقيقة:ثانية).


            */

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
