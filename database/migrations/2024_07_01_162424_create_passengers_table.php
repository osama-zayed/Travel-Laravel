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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');//تاريخ الميلاد
            $table->string('gender');// (الجنس)
            $table->string('email');//(البريد الإلكتروني)
            $table->string('phone');//(رقم الهاتف)
            $table->string('address');//(العنوان)
            $table->string('nationality');//(الجنسية)
            $table->string('passport_number');//(رقم جواز السفر)
            $table->date('passport_date');//(تاريخ جواز السفر)
            $table->string('passport_image');//(صورة جواز السفر)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
