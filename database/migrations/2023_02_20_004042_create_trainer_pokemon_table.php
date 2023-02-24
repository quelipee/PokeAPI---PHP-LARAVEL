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
        Schema::create('trainer_pokemon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->constrained('trainers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('pokemon_id')->constrained('pokemons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /*trainer_id: int references id in trainers
    pokemon_id int references id in pokemons*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_pokemon');
    }
};
