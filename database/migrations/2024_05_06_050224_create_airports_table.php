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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string('city');
            $table->string('country');
            $table->string('code');
            $table->timestamps();





            /*
 id INT PRIMARY KEY,
    name VARCHAR(255),
    city VARCHAR(100),
    country VARCHAR(100),
    code VARCHAR(10)
           ****
           INSERT INTO Airport (id, name, city, country, code) VALUES
(1, 'Los Angeles International Airport', 'Los Angeles', 'USA', 'LAX'),
(2, 'Heathrow Airport', 'London', 'UK', 'LHR'),
(3, 'Tokyo Haneda Airport', 'Tokyo', 'Japan', 'HND'),
(4, 'Dubai International Airport', 'Dubai', 'UAE', 'DXB'),
(5, 'Charles de Gaulle Airport', 'Paris', 'France', 'CDG');

جدول المطار (Airport):

id: معرف فريد لكل مطار.
name: اسم المطار.
city: المدينة التي يقع فيها المطار.
country: الدولة التي يقع فيها المطار.
code: كود المطار (عادةً ما يكون رمز إياتا IATA code).
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
