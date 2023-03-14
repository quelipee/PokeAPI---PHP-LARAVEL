<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\PokeDomain\PokeService\PokeService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function __construct(public PokeService $pokeService)
    {
    }

    /**
     * Seed the application's database.
     * @throws GuzzleException
     */
    public function run(): void
    {
        $this->pokeService->storeAllPokemons();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
