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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('statusAPI')->unique();
            $table->string('img_url')->nullable();
            $table->longText('attribute');
            $table->timestamps();
        });
    }

    /*table: pokemons
    ------
    id: int primary key auto increment
    name: string
    image_url: string
    attribute: string (lighning, ice, fire etc)*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
