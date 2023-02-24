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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('region');
            $table->integer('age');
            $table->timestamps();
        });
    }

    /*id: int primary key auto increment
    name: string
    region: string (Kanto, Johto, Hoenn, Sinnoh)
    age: int*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
